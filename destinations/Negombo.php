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


  <title>Desinations - Explore Srilanka</title>
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
        <li class="active">Negombo</li>
      </ol>
    </div>

    <div class="container">
      <h1 class="headings mini-heading">Negombo</h1>
      <p class="lead mini-lead">Nestled within easy reach of Sri Lanka's bustling commercial capital, Negombo beckons travelers with its aquatic charm and vibrant atmosphere. Renowned for its thriving fisheries industry, the region is a haven for seafood enthusiasts, offering an array of freshly prepared delights to tantalize the taste buds of culinary adventurers. Whether you're a native or a visitor from afar, Negombo promises a delightful beach escape, inviting you to bask in the sun and soak up the coastal splendor of Sri Lanka.</p>
    </div>

    <!-- Content -->

    <div class="owl-carousel owl-theme">
      <div class="owl-caousel-item"> <img src="./Images/negombo.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/kalpitiya.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/mirissa1.jpg" alt=""> </div>
      <div class="owl-caousel-item"> <img src="./Images/Unawatunaaaa.jpg" alt=""> </div>
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

              <p class="content-paragraph">Nestled along Sri Lanka's picturesque coastline, Negombo beckons travelers with its blend of natural beauty, cultural richness, and colonial charm. Situated within easy reach of the bustling metropolis of Colombo, this coastal town offers a serene retreat for both locals and international visitors alike. Negombo's economy thrives on its fishing industry, providing an abundance of fresh seafood that delights the palates of culinary enthusiasts.
</p>

              <p class="content-paragraph"> The town's vibrant fish markets and seafood restaurants offer a tantalizing array of oceanic delights, showcasing the region's rich maritime heritage.</p>

              <h3 class="content-destination-tittle">ATTRACTIONS IN NEGOMBO</h3>
              <p class="content-paragraph"></p>

              <h4 class="content-destination-tittle">Dutch Fort</h4>
              <p class="content-paragraph">Standing as a testament to Negombo's colonial past, the Dutch Fort embodies the rich history and architectural legacy of the Dutch influence in the region. Originally constructed atop the remnants of a Portuguese fort, the Dutch fortifications have withstood the test of time, offering visitors a glimpse into Negombo's storied past. A visit to this iconic landmark is a must for any traveler seeking to delve into the region's colonial heritage.</p>

              <h4 class="content-destination-tittle">St Mary’s Church</h4>
              <p class="content-paragraph">As one of the largest cathedrals in Sri Lanka, St Mary’s Church stands as a symbol of the enduring Portuguese influence in Negombo. Adorned with intricate sculptures and adorned ceilings painted by local artists, the church exudes an aura of sacred beauty and historical significance. Visitors can explore the hallowed halls of this majestic cathedral, immersing themselves in its rich architectural and religious heritage.</p>

              <h4 class="content-destination-tittle">Angurukaramulla Temple</h4>
              <p class="content-paragraph">Venture into the captivating realm of spirituality at the Angurukaramulla Temple, where ancient traditions and intriguing design converge. This unique temple entrance, shaped like a dragon's mouth, sets the stage for a mystical journey into the heart of Negombo's cultural tapestry. Explore the temple grounds, adorned with ancient relics and a centuries-old library, and discover the spiritual essence that permeates this sacred site.</p>

              <h4 class="content-destination-tittle">The Dutch Canal</h4>
              <p class="content-paragraph">Embark on a journey through Negombo's colonial past with a visit to the Dutch Canal, a marvel of Dutch engineering and ingenuity. Stretching over 120 kilometers and reaching all the way to Puttalam, this extensive canal system serves as a testament to the Dutch mastery of hydraulic infrastructure. Visitors can marvel at the intricate network of waterways and gain insight into Negombo's historical significance as a strategic trading hub.</p>

              <h4 class="content-destination-tittle">Muthurajawela Marsh</h4>
              <p class="content-paragraph">Escape the hustle and bustle of modern life and immerse yourself in the tranquility of Muthurajawela Marsh, a pristine sanctuary of natural beauty. Home to a diverse array of bird species and indigenous flora, this marshy wetland offers a blissful retreat for nature lovers and wildlife enthusiasts. Explore the marshland by boat and soak in the serenity of this hidden gem nestled within Negombo's coastal landscape.</p>
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

                $sql = "SELECT full_name, short_desc, hotel_picture FROM hotels WHERE city = 'Kandy'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        
                        echo '<div class="destination-content-container">';
                        echo '<div class="destination-image-container">';
                        $image_location = $row['hotel_picture'];
                        echo '<img src="../' . $image_location . '" alt="">';
                        echo '</div>';
                        echo '<div class="destination-hotel-container">';
                        echo '<h3 class="content-title">' . $row['full_name'] . '</h3>';
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
  <script src="../js/script.js"></script>

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
</body>

</html>