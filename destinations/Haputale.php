<?php
$cityCondition = "'Badulla'";
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


  <title>Haputale | Explore Srilanka</title>
</head>

<body>

  <!-- Header -->
  <?php
  include '../components/header.php';
  ?>

  <div class="top-image">
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../destinations.php">Destinations</a></li>
        <li class="active">Haputale</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Haputale</h1>
      <p class="lead mini-lead">Situated on the southern edge of Sri Lanka's picturesque Hill Country, Haputale beckons travelers with its stunning landscapes and rich biodiversity. Nestled in the Badulla district, this charming town is a paradise for trekkers and nature enthusiasts, offering a serene escape from the hustle and bustle of city life. With its vast tea estates, lush gardens, and rolling hillsides, Haputale captivates visitors with its natural beauty and tranquil ambiance.</p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/haputale.jpeg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/haputalee.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/haputale.jpeg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/haputalee.jpg" alt=""> </div>
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

              <p class="content-paragraph">Haputale, perched on the southern edge of Sri Lanka's Hill Country, offers a captivating blend of natural beauty and colonial charm. Surrounded by rolling hills adorned with verdant tea estates and lush vegetation, this tranquil town provides a refreshing escape from the hustle and bustle of urban life. The crisp mountain air and cool climate create an invigorating atmosphere, perfect for leisurely strolls or adventurous treks through the scenic countryside. As you wander through the streets of Haputale, you'll encounter remnants of its colonial past, from historic buildings adorned with intricate architectural details to quaint tea bungalows nestled amidst emerald-green tea fields. The town's rich cultural heritage is evident in its diverse population, with influences ranging from British colonialism to indigenous traditions.</p>

              <p class="content-paragraph"> Haputale serves as a gateway to the region's natural wonders, including the picturesque Lipton’s Seat viewpoint, where visitors can marvel at panoramic vistas of tea plantations stretching as far as the eye can see. The Thangmale Bird Sanctuary offers a sanctuary for birdwatchers, with its diverse avian species and pristine landscapes. Adisham Bungalow provides a glimpse into the region's colonial past, with its elegant architecture and serene surroundings.</p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN HAPUTALE</h3>
              <p class="content-paragraph">Explore the historic charm of Adisham Bungalow, a beautiful country house nestled near Haputale. Dating back to the colonial era, this picturesque estate is one of the oldest refuges in the region, with architecture influenced by Jacobean and Tudor styles. Once belonging to the former chairman of George Steuart and Co, the estate offers a glimpse into Haputale's colonial past and serves as a tranquil retreat amidst lush surroundings.</p>

              <h4 class="content-destination-tittle">Adisham Bungalow</h4>
              <p class="content-paragraph">Embark on a journey to Lipton’s Seat, a legendary viewpoint that stands as a testament to the economic prowess of the British Colonists. It is said that the renowned tea mogul, John Lipton, once sat on this seat and admired the panoramic views of his vast plantations. Perched atop a hill, Lipton’s Seat offers breathtaking vistas of the surrounding tea estates and rolling hills, making it a must-visit attraction in Haputale.</p>

              <h4 class="content-destination-tittle">Lipton’s Seat</h4>
              <p class="content-paragraph">Immerse yourself in the natural splendor of Thangmale Bird Sanctuary, a thrilling excursion for nature lovers. Known as the "Golden Mountain," this protected area is home to a diverse array of bird species, including blue magpies, mini-verts hornbills, and golden orioles. Explore the sanctuary's lush landscapes and tranquil trails, and don't forget to bring your camera to capture the beauty of these feathered inhabitants in their natural habitat.</p>

              <h4 class="content-destination-tittle">Thangmale Bird Sanctuary</h4>
              <p class="content-paragraph">Step back in time with a visit to St Andrews Church, perhaps the oldest Anglican church in the Badulla district. Consecrated in 1869, this picturesque church boasts a rich history and architectural elegance. Admire the intricate details of its design and explore the church grounds, where centuries-old gravestones offer fascinating insights into the lives of Haputale's colonial past.</p>

              <h4 class="content-destination-tittle">St Andrews Church</h4>
              <p class="content-paragraph">Step back in time with a visit to St Andrews Church, perhaps the oldest Anglican church in the Badulla district. Consecrated in 1869, this picturesque church boasts a rich history and architectural elegance. Admire the intricate details of its design and explore the church grounds, where centuries-old gravestones offer fascinating insights into the lives of Haputale's colonial past.</p>
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