<?php

$package_name = 'Adventure Expedition';
$packagedays = 3;
$packageDistrict = array('Badulla');

$cityCondition = '';

foreach ($packageDistrict as $city) {
  $cityCondition .= "'" . $city . "', ";
}
$cityCondition = rtrim($cityCondition, ', ');

require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
      case 'fetchData':
        handleFetchData();
        break;
      case 'addReservation':
        handleAddReservation();
        break;
      default:
        echo json_encode(array(
          'success' => false,
          'message' => 'Invalid action specified.'
        ));
        break;
    }
  } else {
    echo json_encode(array(
      'success' => false,
      'message' => 'No action specified.'
    ));
  }
}

function handleFetchData()
{
  global $conn, $packagedays, $cityCondition;

  if (isset($_POST['selectedDate'])) {
    $selectedDate = $_POST['selectedDate'];

    $nextDay = date('Y-m-d', strtotime($selectedDate . ' +' . $packagedays . ' day'));

    $sqlHotels = "SELECT h.hotel_id, h.name, hr.room_id
                        FROM hotelrooms hr
                        JOIN hotels h ON hr.hotel_id = h.hotel_id
                        LEFT JOIN hotelreservation r 
                        ON hr.hotel_id = r.hotel_id 
                        AND hr.room_id = r.room_number
                        AND ('$selectedDate' <= r.reserved_till) 
                        AND ('$nextDay' >= r.reserved_from) 
                        WHERE hr.add_to_packages = 'Yes' 
                        AND hr.district IN ($cityCondition)
                        AND h.active = 1
                        AND r.room_number IS NULL";

    $resultHotels = mysqli_query($conn, $sqlHotels);

    $availableHotels = array();
    while ($row = mysqli_fetch_assoc($resultHotels)) {
      $availableHotels[] = array(
        'id' => $row['hotel_id'],
        'name' => $row['name'],
        'roomNumber' => $row['room_id']
      );
    }

    $sqlTourGuides = "SELECT tg.tg_id, tg.full_name 
                        FROM tourguide tg
                        LEFT JOIN tourguidebooking tb
                        ON tg.tg_id = tb.tg_id
                        AND ('$selectedDate' <= tb.booked_till) 
                        AND ('$nextDay' >= tb.booked_from)
                        WHERE tg.district IN ($cityCondition)
                        AND tg.active = 1
                        AND tb.tg_id IS NULL";

    $resultTourGuides = mysqli_query($conn, $sqlTourGuides);

    $availableTourGuides = array();
    while ($row = mysqli_fetch_assoc($resultTourGuides)) {
      $availableTourGuides[] = array(
        'id' => $row['tg_id'],
        'name' => $row['full_name']
      );
    }

    $response = array(
      'hotels' => $availableHotels,
      'tourGuides' => $availableTourGuides
    );

    echo json_encode($response);

    exit;
  } else {
    echo json_encode(array(
      'success' => false,
      'message' => 'Selected date not provided.'
    ));
  }
}

function handleAddReservation()
{
  global $conn, $packagedays, $package_name;

  if (isset($_POST['selectedDate'], $_POST['hotelId'], $_POST['hotelName'], $_POST['tourGuideId'], $_POST['tourGuideName'], $_POST['roomNumber']) && isset($_SESSION['customer_email'])) {
    $selectedDate = $_POST['selectedDate'];
    $hotelId = $_POST['hotelId'];
    $hotelName = $_POST['hotelName'];
    $tourGuideId = $_POST['tourGuideId'];
    $tourGuideName = $_POST['tourGuideName'];
    $roomNumber = $_POST['roomNumber'];

    $customer_email = $_SESSION['customer_email'];

    $sql = "SELECT * FROM customers WHERE email = '$customer_email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $customer_data = mysqli_fetch_assoc($result);
      $customer_id = $customer_data['customer_id'];
      $customer_name = $customer_data['full_name'];
    } else {
      echo json_encode(array(
        'success' => false,
        'message' => 'Customer not found.'
      ));
      exit;
    }

    $nextDay = date('Y-m-d', strtotime($selectedDate . ' +' . $packagedays . ' day'));

    $reservedFrom = $selectedDate;
    $reservedTill = $nextDay;

    $sql = "SELECT MAX(RIGHT(pkg_order_id, 5)) AS max_id FROM packageorders";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $max_id = $row['max_id'];
    $next_id = $max_id + 1;
    $pkg_order_id = 'PKG' . str_pad($next_id, 5, '0', STR_PAD_LEFT);

    $sqlInsertPackageOrder = "INSERT INTO packageorders (pkg_order_id, package_name, customer_id, customer_name, reserved_from, reserved_till) 
                                    VALUES ('$pkg_order_id', '$package_name', '$customer_id', '$customer_name', '$reservedFrom', '$reservedTill')";

    if (mysqli_query($conn, $sqlInsertPackageOrder)) {
      $sql = "SELECT MAX(RIGHT(reservation_id, 5)) AS max_id FROM hotelreservation";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $max_id = $row['max_id'];
      $next_id = $max_id + 1;
      $reservation_id = 'RES' . str_pad($next_id, 5, '0', STR_PAD_LEFT);

      $sqlInsertReservation = "INSERT INTO hotelreservation (reservation_id, hotel_id, name, room_number, reserved_from, reserved_till, customer_id, pkg_order_id, approval) 
                                VALUES ('$reservation_id', '$hotelId', '$hotelName', '$roomNumber', '$reservedFrom', '$reservedTill', '$customer_id', '$pkg_order_id', 'Approved')";

      if (mysqli_query($conn, $sqlInsertReservation)) {

        // generate booking_id to tourguide
        $sql = "SELECT MAX(RIGHT(booking_id, 5)) AS max_id FROM tourguidebooking";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $max_id = $row['max_id'];
        $next_id = $max_id + 1;
        $booking_id = 'B' . str_pad($next_id, 5, '0', STR_PAD_LEFT);

        // get hotel data from hotel_id
        $sql = "SELECT * FROM hotels WHERE hotel_id = '$hotelId'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $hotelEmail = $row['email'];

        // get tourguide data from tg_id
        $sql = "SELECT * FROM tourguide WHERE tg_id = '$tourGuideId'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $tourguideEmail = $row['email'];

        // customer data from session
        $customerEmail = $_SESSION['customer_email'];
        $sql = "SELECT first_name FROM customers WHERE email = '$customerEmail'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $customerFirstName = $row['first_name'];

        $sqlInsertTourGuideBooking = "INSERT INTO tourguidebooking (booking_id, tg_id, name, booked_from, booked_till, customer_id, pkg_order_id) 
                                        VALUES ('$booking_id', '$tourGuideId', '$tourGuideName', '$reservedFrom', '$reservedTill', '$customer_id', '$pkg_order_id')";

        if (mysqli_query($conn, $sqlInsertTourGuideBooking)) {

          include 'send_emails.php';

          $response = array(
            'success' => true,
            'message' => 'Reservation, package order, and tour guide booking added successfully.'
          );
        } else {
          $response = array(
            'success' => false,
            'message' => 'Failed to add tour guide booking: ' . mysqli_error($conn)
          );
        }
      } else {
        $response = array(
          'success' => false,
          'message' => 'Failed to add reservation: ' . mysqli_error($conn)
        );
      }
    } else {
      $response = array(
        'success' => false,
        'message' => 'Failed to add package order: ' . mysqli_error($conn)
      );
    }

    echo json_encode($response);

    exit;
  } else {
    echo json_encode(array(
      'success' => false,
      'message' => 'One or more required parameters are missing or customer email not found in session.'
    ));
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/responsive.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css" />


  <title>Adventure Expedition | Explore Srilanka</title>

</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
    <img src="./Images/slide1.jpg" alt="iamge">
    <!-- <h1 class="headings sub-heading">Wildlife Adventure</h1>
        <h2 class="heading-normal-txt-mini">Tours</h2> -->
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../tours.php">Tours</a></li>
        <li class="active">Adventure Expedition</li>
      </ol>
    </div>

    <!-- Heading -->
    <h1 class="mini-heading" style="margin-top: 20px;">Adventure Expedition</h1>
    <p class="lead mini-lead"> Introducing our thrilling Adventure Expedition package! Brace yourself for an adrenaline-fueled journey through the rugged terrain of Sri Lanka's picturesque town of Ella. This 3-day, 2-night adventure is packed with exhilarating activities and breathtaking scenery, promising an unforgettable experience for thrill-seekers and nature enthusiasts alike. From trekking to zip-lining, waterfall abseiling to exploring iconic landmarks, our expertly curated itinerary will take you on a whirlwind adventure, immersing you in the natural beauty and cultural richness of Ella. Get ready to push your limits, create lasting memories, and embark on the adventure of a lifetime with our Adventure Expedition package.
    </p>


    <!-- Content -->

    <div class="owl-carousel owl-theme" id="owl1">
      <div class="owl-caousel-item"> <img src="Images/ella1.jpeg" alt="tours_image"> </div>
      <div class="owl-caousel-item"> <img src="Images/ella6.avif" alt="tours_image"> </div>
      <div class="owl-caousel-item"> <img src="Images/ella2.avif" alt="tours_image"> </div>
      <div class="owl-caousel-item"> <img src="Images/ella7.avif" alt="tours_image"> </div>
      <div class="owl-caousel-item"> <img src="Images/ella4.avif" alt="tours_image"> </div>
      <div class="owl-caousel-item"> <img src="Images/ella3.avif" alt="tours_image"> </div>
      <div class="owl-caousel-item"> <img src="Images/ella5.avif" alt="tours_image"> </div>

    </div>


    <div class="tab-package">
      <div class="tabbed-content">
        <nav class="tabs">
          <ul>
            <li><a href="#tab1" class="active">Overview</a></li>
            <li><a href="#tab2">Hotel</a></li>
            <li><a href="#tab3">Tour Guide</a></li>
            <!-- <li><a href="#tab4">Pricing</a></li> -->
          </ul>
        </nav>

        <div id="tab1" class="item active" data-title="Overview">
          <div class="item-content">
            <div class="overview-content">
              <div class="heading-text">
              </div>
              <div class="text-content">
                <h4 class="content-destination-tittle"> Duration: 3 days / 2 nights</h4>
                <h4 class="content-destination-tittle">City: Ella</h4>
                <h4 class="content-destination-tittle">District: Badulla</h4>
                <h4 class="content-destination-tittle">Number of Persons: 4 Persons</h4>

                <p class="content-destinaation-tittle">
                  Embark on an exhilarating Adventure Expedition through the rugged terrain of Sri Lanka's picturesque town of Ella. This 3-day, 2-night package is designed for thrill-seekers and nature enthusiasts looking to push their limits and immerse themselves in the stunning landscapes of Ella. From trekking to zip-lining, waterfall abseiling to exploring iconic landmarks, our Adventure Expedition promises an unforgettable journey filled with adrenaline-pumping activities and breathtaking scenery. Get ready to create lasting memories and embark on the adventure of a lifetime amidst the natural beauty and cultural richness of Ella.
                </p>
                <h3 class="content-destination-tittle">Places to Visit:</h3>
                <ul class="package-main-list">

                  <li>Day 1: Arrival in Ella
                    <ul class="package-list">
                      <li>Welcome to Ella! Your adventure begins as our professional guides pick you up from your designated location. Sit back, relax, and enjoy a comfortable journey to your accommodation in Ella, where you'll check-in and unwind before the excitement of your expedition unfolds.</li>
                      <li>After settling in, you'll have the opportunity to explore the charming town of Ella at your leisure. Stroll through the streets lined with quaint cafes and shops, soaking in the laid-back atmosphere and picturesque surroundings.</li>
                      <li>In the evening, enjoy a delicious dinner featuring local delicacies, immersing yourself in Ella's culinary delights.</li>
                      <li>As night falls, take some time to relax and prepare for the exciting adventures that await you in the days ahead.</li>
                    </ul>
                  </li>
                  <li>Day 2: Trekking and Exploration

                    <ul class="package-list">
                      <li>After a hearty breakfast, gear up for an exhilarating day of trekking and exploration in Ella.</li>
                      <li>Embark on a scenic trek to the summit of Little Adam's Peak, where you'll be rewarded with breathtaking panoramic views of the surrounding mountains and tea plantations.</li>
                      <li>Next, venture to the iconic Nine Arch Bridge, an architectural marvel nestled amidst lush greenery. Take in the beauty of this historic landmark and capture stunning photographs against the backdrop of Ella's scenic landscapes.</li>
                      <li>Experience adrenaline-pumping activities like waterfall abseiling and jungle zip-lining, adding an extra thrill to your adventure. Descend down cascading waterfalls and soar through the treetops, immersing yourself in the natural beauty of Ella.</li>
                      <li>Return to your accommodation in the evening, where you can relax and recount the day's adventures over a delicious dinner.</li>
                    </ul>
                  </li>

                  <li>Day 3: Nature Adventures<ul class="package-list">
                      <li>Begin your day with an early morning nature walk to witness the stunning sunrise from Ella Rock, one of the most iconic viewpoints in Sri Lanka. After capturing the breathtaking sunrise, our guides will accompany you on a leisurely stroll to Ravana Falls, where you can immerse yourself in the tranquility of nature.</li>
                      <li>Following your exploration of Ravana Falls, we'll return to your accommodation for a farewell breakfast amidst the serene surroundings of Ella. Relish your final moments in this enchanting destination, knowing that the memories of your adventure will last a lifetime.</li>
                      <li>As your expedition comes to a close, our team will arrange for your comfortable transportation to your departure point, ensuring a seamless conclusion to your unforgettable journey through Nuwara Eliya.</li>
                    </ul>
                  </li>


                </ul>

                <h3 class="content-destination-tittle">Price: LKR 80,000</h3>

                <button id="book-now-btn" class="btn-book-now">Book Now</button>

              </div>
            </div>
          </div>
        </div>
        <div id="tab2" class="item" data-title="Hotel">
          <div class="item-content">
            <div class="itinerary-content">

              <?php
              require_once '../config.php';
              $conn = mysqli_connect($hostname, $username, $password, $database);

              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }

              $sql = "SELECT name, short_desc, hotel_picture, distance, district, hotel_url FROM hotels WHERE district IN ($cityCondition) AND active = 1";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                  echo '<div class="destination-content-container">';
                  echo '<div class="destination-image-container">';
                  $image_location = $row['hotel_picture'];
                  echo '<img src="../' . $image_location . '" alt="image">';
                  echo '</div>';
                  echo '<div class="destination-hotel-container">';
                  echo '<h3 class="content-title">' . $row['name'] . '</h3>';
                  echo '<p class="content-paragraph">' . $row['short_desc'] . '</p>';
                  echo '<p class="content-paragraph">' . $row['distance'] . ' km away from ' . $row['district'] . '.</p>';
                  echo '<p class="content-paragraph"><a href="../hotels/' . $row['hotel_url'] . '">Read more</a></p>';
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "No hotels found in $cityCondition.";
              }

              mysqli_close($conn);
              ?>
            </div>
          </div>
        </div>
        <div id="tab3" class="item" data-title="Tour Guides">
          <div class="item-content">
            <div class="itinerary-content">

              <?php
              require_once '../config.php';
              $conn = mysqli_connect($hostname, $username, $password, $database);

              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }

              $sql = "SELECT full_name, picture, specialty, short_desc, experience FROM tourguide WHERE district IN ($cityCondition) AND active = 1";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                  echo '<div class="destination-content-container">';
                  echo '<div class="tourguide-image-container">';
                  $image_location = $row['picture'];
                  echo '<img src="../' . $image_location . '" alt="image">';
                  echo '</div>';
                  echo '<div class="destination-hotel-container">';
                  echo '<h3 class="content-title">' . $row['full_name'] . '</h3>';
                  echo '<p class="content-paragraph"><b>Specialty: </b>' . $row['specialty'] . '</p>';
                  echo '<p class="content-paragraph">' . $row['short_desc'] . '</p>';
                  echo '<p class="content-paragraph"><b>Years of Experience: </b>' . $row['experience'] . ' Years</p>';
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "No tourguides found.";
              }

              mysqli_close($conn);
              ?>
            </div>
          </div>
        </div>


      </div>
    </div>

    <!-- <h1 class="headings">Related <span>Packages</span></h1>

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>

    </div> -->

  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var tabs = document.querySelectorAll('.tabs a');
      tabs.forEach(function(tab) {
        tab.addEventListener('click', function(e) {
          e.preventDefault();
          var targetTab = this.getAttribute('href').slice(1);
          var activeTab = document.querySelector('.item.active');
          if (activeTab) {
            activeTab.classList.remove('active');
          }
          document.getElementById(targetTab).classList.add('active');
          document.querySelector('.tabs a.active').classList.remove('active');
          this.classList.add('active');
        });
      });
    });
  </script>

  <!-- Footer -->
  <?php
  include '../components/footer.php';
  ?>

  <script src="../node_modules/jquery/dist/jquery.js"></script>
  <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#owl1').owlCarousel({
        items: 4,
        loop: true,
        margin: 5,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true
      });

      $('#owl1').owlCarousel({
        items: 3,
        loop: true,
        margin: 5,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const bookNowButton = document.querySelector('.btn-book-now');

      bookNowButton.addEventListener('click', function() {
        const customerEmail = "<?php echo isset($_SESSION['customer_email']) ? $_SESSION['customer_email'] : '' ?>";

        if (!customerEmail) {
          Swal.fire({
            title: "Login",
            text: "You're not logged in. Please login.",
            icon: "error"
          });
        } else {

          const currentDate = new Date();
          const minDate = new Date();
          minDate.setDate(currentDate.getDate() + 2);
          const maxDate = new Date();
          maxDate.setFullYear(maxDate.getFullYear() + 1);

          const minDateString = minDate.toISOString().split('T')[0];
          const maxDateString = maxDate.toISOString().split('T')[0];

          Swal.fire({
            title: "Select the Date",
            html: `<input id="datepicker" class="custom-datepicker" type="date" min="${minDateString}" max="${maxDateString}">`,
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Next",
            cancelButtonText: "Cancel",
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
              const nextButton = Swal.getConfirmButton();
              nextButton.disabled = true;

              const datepicker = document.getElementById('datepicker');
              datepicker.addEventListener('input', () => {
                nextButton.disabled = !datepicker.value;
              });
            }
          }).then((result) => {
            if (result.isConfirmed) {
              const selectedDate = document.getElementById('datepicker').value;

              $.ajax({
                url: '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                  action: 'fetchData',
                  selectedDate: selectedDate
                },
                success: function(response) {
                  Swal.close();

                  Swal.fire({
                    title: "Choose a hotel and a tour guide",
                    html: `
                    <p>Selected Date: ${selectedDate}</p>
                    <div class="package-book-swal">
                        <p class="small-paragraph">Hotels: <select id="hotels" class="swal-select"></select></p>
                        <p class="small-paragraph">Tour guides: <select id="tourGuides" class="swal-select"></select></p>
                        <p class="small-paragraph" id="package-swal-text">Please note this is the hotel and tour guide you'll be accompanied with.</p>
                    </div>
                  `,
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Confirm",
                    cancelButtonText: "Cancel",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didRender: () => {
                      const hotelsDropdown = document.getElementById('hotels');
                      response.hotels.forEach(function(hotel) {
                        const option = document.createElement('option');
                        option.value = hotel.id;
                        option.setAttribute('hotel-name', hotel.name);
                        option.setAttribute('hotel-room-number', hotel.roomNumber);
                        option.text = `${hotel.name} - Room ${hotel.roomNumber}`;
                        hotelsDropdown.appendChild(option);
                      });

                      const tourguideDropdown = document.getElementById('tourGuides');
                      response.tourGuides.forEach(function(tourguide) {
                        const option = document.createElement('option');
                        option.value = tourguide.id;
                        option.text = tourguide.name;
                        tourguideDropdown.appendChild(option);
                      });

                      if (response.hotels.length === 0) {
                        const notFoundOption = document.createElement('option');
                        notFoundOption.text = 'No Available Hotels';
                        hotelsDropdown.appendChild(notFoundOption);
                        hotelsDropdown.disabled = true;
                      }

                      if (response.tourGuides.length === 0) {
                        const notFoundOption = document.createElement('option');
                        notFoundOption.text = 'No Available Tour Guides';
                        tourguideDropdown.appendChild(notFoundOption);
                        tourguideDropdown.disabled = true;
                      }

                      if (response.hotels.length === 0 || response.tourGuides.length === 0) {
                        document.querySelector('.swal2-confirm').disabled = true;
                        document.getElementById('package-swal-text').innerText = "Unfortunately, there are no tour guides / hotels available for the selected date.";
                      }
                    }
                  }).then((result) => {
                    if (result.isConfirmed) {
                      const selectedHotelId = document.getElementById('hotels').value;
                      const selectedHotelName = document.getElementById('hotels').options[document.getElementById('hotels').selectedIndex].getAttribute('hotel-name');
                      const selectedHotelRoomNumber = document.getElementById('hotels').options[document.getElementById('hotels').selectedIndex].getAttribute('hotel-room-number');
                      const selectedTourGuideId = document.getElementById('tourGuides').value;
                      const selectedTourGuideName = document.getElementById('tourGuides').options[document.getElementById('tourGuides').selectedIndex].text;

                      const reservedTill = new Date(selectedDate);
                      reservedTill.setDate(reservedTill.getDate() + 1);

                      const data = {
                        action: 'addReservation',
                        selectedDate: selectedDate,
                        hotelId: selectedHotelId,
                        hotelName: selectedHotelName,
                        tourGuideId: selectedTourGuideId,
                        tourGuideName: selectedTourGuideName,
                        roomNumber: selectedHotelRoomNumber
                      };

                      Swal.fire({
                        title: 'Processing...',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        didOpen: () => {
                          Swal.showLoading();
                          $.ajax({
                            url: '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>',
                            type: 'POST',
                            dataType: 'json',
                            data: data,
                            success: function(response) {
                              if (response.success) {
                                Swal.fire({
                                  title: 'Success!',
                                  text: response.message,
                                  icon: 'success'
                                });
                              } else {
                                Swal.fire({
                                  title: 'Error!',
                                  text: response.message,
                                  icon: 'error'
                                });
                              }
                            },
                            error: function(xhr, status, error) {
                              console.error(error);
                              Swal.fire({
                                title: 'Error!',
                                text: 'Failed to add reservation. Please try again later.',
                                icon: 'error'
                              });
                            }
                          });
                        }
                      });
                    }
                  });
                },
                error: function(xhr, status, error) {
                  console.error(error);
                  Swal.fire({
                    title: 'Error!',
                    text: 'Failed to fetch available hotels and tour guides. Please try again later.',
                    icon: 'error'
                  });
                }
              });
            }
          });
        }
      });
    });
  </script>

  <button id="toTop" class="fa fa-arrow-up"></button>

  <script src="../js/script.js"></script>

</body>

</html>