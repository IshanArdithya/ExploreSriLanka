<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedDate'])) {
  // Step 1: Fetch the selected date from the date picker
  $selectedDate = $_POST['selectedDate'];

  // Step 2: Calculate the next day
  $nextDay = date('Y-m-d', strtotime($selectedDate . ' +1 day'));

  // Step 3: Query the hotelrooms table to get the available hotels
  // Modify your SQL query to fetch available hotels
  $sqlHotels = "SELECT DISTINCT h.name 
                FROM hotelrooms h
                LEFT JOIN hotelreservation r 
                ON h.hotel_id = r.hotel_id 
                AND ('$selectedDate' <= r.reserved_till) 
                AND ('$nextDay' >= r.reserved_from) 
                WHERE h.add_to_packages = 'Yes' 
                AND h.city = 'Kandy'
                AND r.hotel_id IS NULL";

  $resultHotels = mysqli_query($conn, $sqlHotels);

  // Fetch available hotels from query result
  $availableHotels = array();
  while ($row = mysqli_fetch_assoc($resultHotels)) {
    $availableHotels[] = $row['name'];
  }

  // Step 4: Query the tourguide table to get available tour guides
  // Modify your SQL query to fetch available tour guides
  $sqlTourGuides = "SELECT tg.full_name 
                    FROM tourguide tg
                    LEFT JOIN tourguidebooking tb
                    ON tg.tg_id = tb.tg_id
                    AND ('$selectedDate' <= tb.booked_till) 
                    AND ('$nextDay' >= tb.booked_from)
                    WHERE tg.city = 'Kandy'
                    AND tg.active = 1
                    AND tb.tg_id IS NULL";

  $resultTourGuides = mysqli_query($conn, $sqlTourGuides);

  // Fetch available tour guides from query result
  $availableTourGuides = array();
  while ($row = mysqli_fetch_assoc($resultTourGuides)) {
    $availableTourGuides[] = $row['full_name'];
  }

  // Step 5: Encode the list of available hotels and tour guides as JSON
  $response = array(
    'hotels' => $availableHotels,
    'tourGuides' => $availableTourGuides
  );

  // Send the JSON response
  echo json_encode($response);

  // Terminate the script to prevent further output
  exit;
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


  <title>About - Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
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
      <div class="owl-caousel-item"> <img src="./Images/ella1.jpeg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/ella6.avif" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/ella2.avif" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/ella7.avif" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/ella4.avif" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/ella3.avif" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/ella5.avif" alt=""> </div>

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

              $sql = "SELECT name, short_desc, hotel_picture FROM hotels WHERE city IN ('Kandy', 'Colombo')";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                  echo '<div class="destination-content-container">';
                  echo '<div class="destination-image-container">';
                  $image_location = $row['hotel_picture'];
                  echo '<img src="../' . $image_location . '" alt="">';
                  echo '</div>';
                  echo '<div class="destination-hotel-container">';
                  echo '<h3 class="content-title">' . $row['name'] . '</h3>';
                  echo '<p class="content-paragraph">' . $row['short_desc'] . '</p>';
                  echo '<p class="content-paragraph">Read more</p>';
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "No hotels found in Kandy.";
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

              $sql = "SELECT full_name, picture, specialty, short_desc, experience FROM tourguide WHERE city IN ('Kandy', 'Colombo')";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                  echo '<div class="destination-content-container">';
                  echo '<div class="tourguide-image-container">';
                  $image_location = $row['picture'];
                  echo '<img src="../' . $image_location . '" alt="">';
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

    <h1 class="headings">Related <span>Packages</span></h1>

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="../Images/slide2.jpg" alt=""> </div>

    </div>

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
  <script src="../js/script.js"></script>

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
        // Check if session "customer_email" exists
        const customerEmail = "<?php echo isset($_SESSION['customer_email']) ? $_SESSION['customer_email'] : '' ?>";

        if (!customerEmail) {
          // If session does not exist, show login message
          Swal.fire({
            title: "Login",
            text: "You're not logged in. Please login.",
            icon: "error"
          });
        } else {
          // If session exists, show date picker
          Swal.fire({
            title: "Select the Date",
            html: '<input id="datepicker" class="custom-datepicker" type="date">',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Next",
            cancelButtonText: "Cancel",
            allowOutsideClick: false,
            allowEscapeKey: false,
          }).then((result) => {
            if (result.isConfirmed) {
              const selectedDate = document.getElementById('datepicker').value;

              // Send the selected date to the PHP script using AJAX
              $.ajax({
                url: '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                  selectedDate: selectedDate
                },
                success: function(response) {
                  // Close the current dialog
                  Swal.close();

                  // Show the next dialog with available hotels and tour guides
                  Swal.fire({
                    title: "Choose a hotel and a tour guide",
                    html: `
                          <p>Selected Date: ${selectedDate}</p>
                          <div class="package-book-swal">
                              <p class="small-paragraph">Hotels: <select id="hotels"></select></p>
                              <p class="small-paragraph">Tour guides: <select id="tourGuides"></select></p>
                              <p class="small-paragraph">Please note this is the hotel and tour guide you'll be accompanied with.</p>
                          </div>
                        `,
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Next",
                    cancelButtonText: "Cancel",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didRender: () => {
                      // Populate the dropdown menu with the available hotels
                      const hotelsDropdown = document.getElementById('hotels');
                      hotelsDropdown.innerHTML = '';
                      response.hotels.forEach(function(hotel) {
                        const option = document.createElement('option');
                        option.value = hotel;
                        option.text = hotel;
                        hotelsDropdown.appendChild(option);
                      });

                      // Populate the dropdown menu with the available tour guides
                      const tourguideDropdown = document.getElementById('tourGuides');
                      tourguideDropdown.innerHTML = '';
                      response.tourGuides.forEach(function(tourguide) {
                        const option = document.createElement('option');
                        option.value = tourguide;
                        option.text = tourguide;
                        tourguideDropdown.appendChild(option);
                      });

                      if (response.hotels.length === 0) {
                        // Add "Not found" option to hotels dropdown
                        const notFoundOption = document.createElement('option');
                        notFoundOption.text = 'Not found';
                        hotelsDropdown.appendChild(notFoundOption);
                      }

                      if (response.tourGuides.length === 0) {
                        // Add "Not found" option to tour guides dropdown
                        const notFoundOption = document.createElement('option');
                        notFoundOption.text = 'Not found';
                        tourguideDropdown.appendChild(notFoundOption);
                      }
                    }
                  }).then((result) => {
                    if (result.isConfirmed) {
                      // Handle next button click if needed
                      // For now, let's just close the dialog
                      Swal.close();
                    }
                  });
                },
                error: function(xhr, status, error) {
                  // Handle errors
                  console.error(error);
                }
              });
            }
          });
        }
      });
    });
  </script>




</body>

</html>