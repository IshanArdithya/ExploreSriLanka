<?php
$cityCondition = "'Matara'";
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


  <title>Matara | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slide19.jpg" alt="">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Matara</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Matara</h1>
      <p class="lead mini-lead">Nestled near Galle, Sri Lanka, the district of Matara stands as a significant coastal destination, boasting a rich heritage and diverse attractions. Despite its commercial significance, Matara remains largely unexplored by international travelers, making it a hidden gem of the south.</p>
    </div>

    <!-- Content -->


    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/matara.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/matara2.jpeg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/matarara3.jpeg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/matara4.jpeg" alt=""> </div>
    </div>

    <div class="tab-package">
      <div class="tabbed-content">
        <nav class="tabs">
          <ul>
            <li><a href="#tab1" class="active">Overview</a></li>
            <li><a href="#tab3">Related Hotels</a></li>

          </ul>
        </nav>

        <div id="tab1" class="item active" data-title="Overview">
          <div class="item-content">
            <div class="overview-content">
              <div class="heading-text">

              </div>
              <div class="text-content">

              </div>

              <p class="content-paragraph">Matara's history intertwines with the ancient kingdom of Polonnaruwa, where it was known as Mahanagathota. Legends suggest that King Maha Parakramabahu deployed armies to Matara to engage his adversaries, marking its strategic importance since ancient times. During the colonial era, both the Portuguese and Dutch invaders left their mark on Matara. The Portuguese named the region 'Maturai,' signifying its significance as a great fortress. Notably, Matara's extensive cinnamon plantations attracted Portuguese attention, leading to their focus on the area.</p>

              <p class="content-paragraph"> In the 18th century, Matara fell under Dutch control after they seized it from the Portuguese. The Dutch fortifications in Matara, including the Matara Fort and Star Fort, served as crucial defensive structures against attacks, particularly from the Kandyan Kingdom. Matara's historical significance extends to its role in nurturing legendary local authors and poets like Kumaratunge Munidasa and Gajaman Nona.</p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN MATARA</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">Matara Fort</h4>
              <p class="content-paragraph">Initially established by the Portuguese and further fortified by the Dutch, Matara Fort showcases a blend of Dutch and English architectural styles. Visitors can explore its intriguing interiors, including a towering 40-foot structure dating back to the British colonial period.</p>

              <h4 class="content-destination-tittle">Star Fort</h4>
              <p class="content-paragraph">Named for its distinctive shape, the Star Fort was built to defend against military strikes from the Kandyan Kingdom. Featuring a deep moat and provisions for a small garrison, the fort provides insight into Matara's military history.</p>

              <h4 class="content-destination-tittle">Parawi Dupatha Temple</h4>
              <p class="content-paragraph">Situated on Pigeon Island amidst lush greenery, this temple houses several Buddha statues and a replica of the footprint found on Adam's Peak. Its tranquil setting and religious significance make it a must-visit attraction in Matara.</p>

              <h4 class="content-destination-tittle">Old Nupe Market</h4>
              <p class="content-paragraph">Dating back to English occupation, the Old Nupe Market's structure reflects colonial influences, with possible Dutch fortifications. While its origins may be uncertain, it served as a bustling market during the English colonial period.</p>

              <h4 class="content-destination-tittle">Dutch Reform Church </h4>
              <p class="content-paragraph">Located within the Dutch fort, the Dutch Reform Church is a captivating colonial-era church consecrated in 1706. Adorned with gravestones dating back to the 17th century, it offers a glimpse into Matara's religious and architectural heritage. In essence, Matara's blend of history, architecture, and natural beauty beckons travelers to explore its hidden treasures and unravel its captivating stories.
              </p>
            </div>
          </div>
        </div>
        <div id="tab3" class="item" data-title="Experiences">
          <div class="item-content">
            <div class="places-content">
              <div class="place-details-wrap">

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
                    echo '<img src="../' . $image_location . '" alt="">';
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


        </div>
      </div>
    </div>


    <h1 class="headings mini-heading">Similar Destinations</h1>


    <div class="owl-carousel owl-theme">
      <div> <img src="../Images/about.jpg" alt=""> </div>
      <div> <img src="../Images/about.jpg" alt=""> </div>
      <div> <img src="../Images/about.jpg" alt=""> </div>
      <div> <img src="../Images/about.jpg" alt=""> </div>
      <div> <img src="../Images/about.jpg" alt=""> </div>
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

  <script>
    $(document).ready(function() {
      $('.owl-carousel').owlCarousel();

    });

    var owl = $('.owl-carousel');
    owl.owlCarousel({
      items: 4,
      loop: true,
      margin: 5,
      autoplay: true,
      autoplayTimeout: 2500,
      autoplayHoverPause: true,
    });
  </script>

  <button id="toTop" class="fa fa-arrow-up"></button>
  <script src="../js/script.js"></script>

</body>

</html>