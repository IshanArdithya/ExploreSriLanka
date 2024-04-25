<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <script src="js/shop.js" defer></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
  <title>Shop | Explore Srilanka</title>

</head>

<body>

  <!-- Header -->
  <?php
  include 'components/header.php';
  ?>

  <div class="top-image">
  <img src="./Images/slides/slide-24.jpg" alt="">
    <h1 class="headings sub-heading"></h1>
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li class="active">Shop</li>
      </ol>
    </div>

    <!--products-->
    <div class="small-conatainer">
      <h1 class="headings mini-heading">Latest Products</h1>

      <div class="shopping-row">

        <?php

        $conn = new mysqli($hostname, $username, $password, $database);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM shopitems ORDER BY item_id DESC LIMIT 4";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="shopping-col-4 a-ratio">';
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

        $conn->close();
        ?>
      </div>

      <h1 class="headings mini-heading">All Products</h1>

<div class="shopping-row shopping-row-2">
  <input type="text" id="searchInput" placeholder="Search...">
  <select id="sortSelect">
    <option value="relevance">Relevance</option>
    <option value="lowest_price">Sort: Lowest Price</option>
    <option value="highest_price">Sort: Highest Price</option>
  </select>
</div>

<div class="shopping-row" id="productList">
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