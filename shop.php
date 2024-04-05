<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
  <title>Shop</title>

</head>

<body>

  <!-- Header -->
  <?php
  include 'components/header.php';
  ?>

  <div class="top-image">
    <h1 class="headings sub-heading"></h1>
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li class="active">Shop</li>
      </ol>
    </div>

    <!--products-->
    <div class="small-conatainer">
      <h1 class="headings mini-heading">Featured Products</h1>

      <div class="shopping-row shopping-row-2">
        <select name="" id="">
          <option value="">Default sorting</option>
          <option value="">Sort by price</option>
          <option value="">Sort by popularity</option>
          <option value="">Sort by shopping-rating</option>
          <option value="">Sort by sale</option>
        </select>
      </div>

      <div class="shopping-row">

        <div class="shopping-col-4">
          <a href="./product-details.php">
            <img src="images/shop/slide1.jpg" alt="">
            <h4>Handmade Elephant Figurine</h4>

            <div class="shopping-rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
            <p class="shop-details">Nicely crafted elephant figurine made by local artisans. Perfect souvenir to remind you of your journey.</p>
            <p class="shop-price">LKR 2,500</p>
          </a>
        </div>


        <div class="shopping-col-4">
          <img src="images/shop/peo2.jpeg" alt="">
          <h4>Ceylon Tea Gift Set Pack</h4>
          <div class="shopping-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p class="shop-details">Delightful gift set featuring premium Ceylon tea blends. Includes assorted teas packed in an elegant gift box.</p>
          <p class="shop-price">LKR 3,200</p>
        </div>

        <div class="shopping-col-4">
          <img src="images/shop/pro3.jpg" alt="">
          <h4>Sri Lankan Spices Collection</h4>
          <div class="shopping-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p class="shop-details">Exquisite collection of authentic Sri Lankan spices. Enhance your culinary skills with these aromatic spices.</p>
          <p class="shop-price">LKR 1,800</p>
        </div>

        <div class="shopping-col-4">
          <img src="images/shop/pro4.png" alt="">
          <h4>Traditional Handloom Sarong</h4>
          <div class="shopping-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p class="shop-details">This sarong featuring traditional Sri Lankan designs. Made from high-quality fabric for a comfortable fit.</p>
          <p class="shop-price">LKR 3,500</p>
        </div>
      </div>

      <h1 class="headings mini-heading">Latest Products</h1>

      <div class="shopping-row">
        <?php

        $conn = new mysqli($hostname, $username, $password, $database);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM shopitems";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="shopping-col-4">';
            echo '<a href="' . $row['shopitemurl'] . '">';
            echo '<img src="' . $row['item_photo'] . '" alt="">';
            echo '<h4>' . $row['item_name'] . '</h4>';
            echo '<div class="shopping-rating">';

            for ($i = 0; $i < 4; $i++) {
              echo '<i class="fa fa-star"></i>';
            }
            echo '<i class="fa fa-star-o"></i>';
            echo '</div>';
            echo '<p class="shop-details">' . $row['item_description'] . '</p>';
            echo '<p class="shop-price">LKR ' . $row['item_price'] . '</p>';
            echo '</a>';
            echo '</div>';
          }
        } else {
          echo "No products found.";
        }
        ?>
      </div>

      <!--Reviews-->
      <div class="shopping-row">


        <div class="shopping-col-3">
          <i class="fa fa-quote-left"></i>

          <p>I purchased the Sri Lankan Handmade Elephant Figurine and it's absolutely stunning! It serves as a beautiful reminder of my trip to Sri Lanka.</p>

          <div class="shopping-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <img src="./Images/user5.jpeg" alt="">

          <h3>Emily Watson</h3>
        </div>

        <div class="shopping-col-3">
          <i class="fa fa-quote-left"></i>

          <p>The Sri Lankan Spices Collection is a must-have for anyone who loves cooking! The flavors are rich & authentic, adding a delicious twist to my dishes.</p>

          <div class="shopping-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <img src="./Images/user4.jpg" alt="">

          <h3>Sarah James</h3>
        </div>

        <div class="shopping-col-3">
          <i class="fa fa-quote-left"></i>

          <p>I'm a tea enthusiast, and the Ceylon Tea Gift Set exceeded my expectations! The variety of teas and their quality are exceptional. </p>
          <div class="shopping-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <img src="./Images/user6.png" alt="">

          <h3>Matt Wilson</h3>
        </div>

      </div>
    </div>

  </div>
  <!-- Footer -->
  <?php
  include 'components/footer.php';
  ?>

<button id="toTop" class="fa fa-arrow-up"></button>

  <script src="js/script.js"></script>

</body>

</html>