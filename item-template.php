<?php
require_once '../config.php';

try {
  $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  die();
}

$sql = "SELECT * FROM shopitems WHERE item_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(['{item_id}']);
$product = $stmt->fetch(PDO::FETCH_ASSOC);


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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
  <?php
    echo '<title>' . $product['item_name'] . ' - Shop</title>';
  ?>

</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Header -->
  <?php
  include '../components/header.php';

  $conn = new mysqli($hostname, $username, $password, $database);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
  ?>

<div class="cart-icon-container">
    <a href="../checkout.php">
    <i class="fas fa-shopping-cart"></i>
    <span id="cartItemCount"><?php echo isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?></span>
    </a>
</div>

  <div class="top-image">
    <h1 class="headings sub-heading"></h1>
  </div>

  <!-- Breadcrumbs -->
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
        <li><a href="../shop.php" title="Explore Sri Lanka" class="bolds">Shop</a></li>
        <?php
        echo '<li class="active">' . $product['item_name'] . ' - Shop</li>';
        ?>
      </ol>
    </div>

    <!--products-->
    <div class="small-conatainer">
      <h1 class="headings mini-heading">Product Details</h1>
    </div>

    <div class="shopping-row single-product-details">
      <div class="shopping-col-4">
        <?php

        echo '<img src="../' . $product['item_photo'] . '" alt="" id="ProducMainImg">';
        ?>
        <div class="small-product-img-row">
          <div class="small-product-img-col">
            <img src="./shop/peo2.jpeg" alt="" class="ProductSubImg">
            <img src="./shop/pro3.jpg" alt="" class="ProductSubImg">
            <img src="./shop/pro4.png" alt="" class="ProductSubImg">
          </div>

        </div>
      </div>
      <?php

      if ($product) {
        echo '<div class="shopping-col-4-item">';
        echo '<h1>' . $product['item_name'] . '</h1>';
        echo '<h4>LKR ' . $product['item_price'] . '</h4>';
        echo '<h5>' . $product['stocks'] . ' stocks remaining</h5>';
        echo '<input type="number" id="quantityInput" value="1" min="1" max="' . $product['stocks'] . '">';
                // echo '<a href="#" class="add-to-cart-btn" data-item-id="' . htmlspecialchars($product['item_id']) . '">Add to cart</a>';
                echo '<button class="add-to-cart-btn" data-item-id="' . htmlspecialchars($product['item_id']) . '">Add to cart</button>';


        echo '<h3 class="product-sub-title">Product Details <i class="fa fa-indent"></i></h3>';
        echo '<br>';
        echo '<p class="shopping-item-description">' . $product['item_description'] . '</p>';
        echo '</div>';
      } else {
        echo 'Product not found.';
      }
      ?>

    </div>

    <h1 class="headings mini-heading">Latest Products</h1>

    <?php

// Fetch the last 4 products from the shopitems table
$sql = "SELECT * FROM shopitems ORDER BY item_id DESC LIMIT 4";
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="shopping-col-4 a-ratio">';
        echo '<a href="../' . $row['shopitemurl'] . '">';
        echo '<img src="../' . $row['item_photo'] . '" alt="">';
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

// Close the database connection
$conn->close();
?>


  </div>

  </div>
  <!-- Footer -->
  <?php
  include '../components/footer.php';
  ?>

  <script src="../js/script.js"></script>

  <!--js for product gallery-->
  <script>
    var ProducMainImg = document.getElementById("ProducMainImg");
    var ProductSubImg = document.getElementsByClassName("ProductSubImg");

    ProductSubImg[0].onclick = function() {
      ProducMainImg.src = ProductSubImg[0].src;
    }

    ProductSubImg[1].onclick = function() {
      ProducMainImg.src = ProductSubImg[1].src;
    }

    ProductSubImg[2].onclick = function() {
      ProducMainImg.src = ProductSubImg[2].src;
    }

  var quantityInput = document.getElementById("quantityInput");
  var maxStocks = <?php echo $product['stocks']; ?>;

  quantityInput.addEventListener('change', function() {
    if (quantityInput.value < 1) {
      quantityInput.value = 1;
    }
    if (quantityInput.value > maxStocks) {
      quantityInput.value = maxStocks;
    }
  });

  </script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Function to handle adding to cart
    function addToCart(itemId) {
      // Get the quantity from the input field
      var quantity = document.getElementById("quantityInput").value;

      // Send an AJAX request to add the item to the cart
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'add-to-cart.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.success) {
            // Show a pop-up notification
            Swal.fire("Added to Cart!");
          } else {
            console.error(response.message);
          }
        } else {
          console.error('Request failed. Status: ' + xhr.status);
        }
      };
      // Send both item ID and quantity to the server
      xhr.send('item_id=' + encodeURIComponent(itemId) + '&quantity=' + encodeURIComponent(quantity));
    }

    // Add event listeners to all add-to-cart buttons
    var addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    addToCartButtons.forEach(function(button) {
      button.addEventListener('click', function(event) {
        event.preventDefault();
        var itemId = this.getAttribute('data-item-id');
        addToCart(itemId);
      });
    });

    // Get the maximum stocks from PHP
    var maxStocks = <?php echo $product['stocks']; ?>;

    // Get the quantity input element
    var quantityInput = document.getElementById("quantityInput");

    // Set the initial value of the quantity input
    quantityInput.value = 1;

    // Add event listener for change event on quantity input
    quantityInput.addEventListener('change', function() {
      // Check if the input value is less than 1
      if (quantityInput.value < 1) {
        quantityInput.value = 1; // Set value to 1
      }
      // Check if the input value is greater than the maximum stocks
      if (quantityInput.value > maxStocks) {
        quantityInput.value = maxStocks; // Set value to maximum stocks
      }
    });

    // Check if stocks are 0, disable input and set value to 0
    if (maxStocks === 0) {
      quantityInput.disabled = true;
      quantityInput.value = 0;
      addToCartButtons.forEach(function(button) {
        button.removeAttribute('href'); // Remove href attribute to prevent clicking
        button.setAttribute('disabled', true); // Disable the button
      });
    }
  });
</script>

</body>
</html>