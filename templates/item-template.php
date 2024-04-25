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
$stmt->execute([$item_id]);
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
<style>
  /* Cart Popup Styles */
  .cart-popup {
    display: none;
    position: fixed;
    bottom: 80px;
    right: 20px;
    width: 300px;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    border-radius: 5px;
    z-index: 1000;
    transition: transform 0.3s ease;
  }

  #cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
  }

  #cart-content {
    max-height: 200px;
    overflow-y: auto;
    padding-right: 10px;
    margin-bottom: 10px;
  }

  .cart-item {
    margin-bottom: 8px;
  }

  .item-name {
    font-weight: bold;
    margin-bottom: 4px;
  }

  #cart-total-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
  }

  #cart-buttons {
    display: flex;
    justify-content: space-between;
  }

  .close-btn {
    font-size: 24px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .close-btn:hover {
    background-color: #007bff;
    color: #ffffff;
    border-radius: 50%;
  }

  button {
    padding: 8px 16px;
    border: none;
    border-radius: 3px;
    background-color: #007bff;
    color: #ffffff;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  button:hover {
    background-color: #0056b3;
  }
</style>

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
    <!-- <a href="../checkout.php"> -->
    <i class="fas fa-shopping-cart"></i>
    <span id="cartItemCount"><?php echo isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?></span>
    <!-- </a> -->
  </div>

  <div class="top-image">
    <h1 class="headings sub-heading"></h1>
  </div>

  <!-- Cart Popup -->
  <div id="cart-popup" class="cart-popup">
    <div id="cart-header">
      <span class="close-btn" onclick="closeCartPopup()"> &times; </span>
      <h2>Shopping Cart</h2>
    </div>
    <div id="cart-content">
      <?php
      $cart = $_SESSION['cart'] ?? array();
      $total = 0;

      foreach ($cart as $itemId => $quantity) {
        $stmt = $pdo->prepare("SELECT item_name, item_price FROM shopitems WHERE item_id = ?");
        $stmt->execute([$itemId]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        $subtotal = $item['item_price'] * $quantity;
        $total += $subtotal;

        echo '<p>' . htmlspecialchars($item['item_name']) . ' x ' . $quantity . '</p>';
        echo '<p>LKR. ' . number_format($subtotal, 2) . '</p>';
      }
      ?>
    </div>
    <div id="cart-total-container">
      <p>Total:</p>
      <p id="cart-total">LKR. <?php echo number_format($total, 2); ?></p>
    </div>
    <div id="cart-buttons">
      <button onclick="checkout()">Checkout</button>
      <button onclick="clearCart()">Clear Cart</button>
    </div>
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

    <div class="shopping-grid">

      <?php
      $sql = "SELECT * FROM shopitems ORDER BY item_id DESC LIMIT 4";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="shopping-col-4 a-ratio shopping-item">';
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

      $conn->close();
      ?>

    </div>

  </div>

  </div>

  <!-- Footer -->
  <?php
  include '../components/footer.php';
  ?>

  <script src="../js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    function updateCartUI() {
      var cartContent = document.getElementById("cart-content");
      cartContent.innerHTML = '';

      cartItemsArray.forEach(function(cartItem) {
        var itemElement = document.createElement('div');
        itemElement.className = 'cart-item';
        itemElement.innerHTML = '<p class="item-name">' + cartItem.name + '</p>' +
          '<p class="item-price">Rs. ' + cartItem.price.toFixed(2) + '</p>';
        cartContent.appendChild(itemElement);
      });

      document.getElementById("cart-total").textContent = 'Rs. ' + totalCartPrice.toFixed(2);
    }

    document.addEventListener('DOMContentLoaded', function() {
      var cartPopup = document.getElementById('cart-popup');
      var cartIconContainer = document.querySelector('.cart-icon-container');

      cartIconContainer.addEventListener('click', function(event) {
        event.preventDefault();
        cartPopup.style.display = 'block';
      });

      var closeBtn = cartPopup.querySelector('.close-btn');
      closeBtn.addEventListener('click', function() {
        cartPopup.style.display = 'none';
      });

      window.addEventListener('click', function(event) {
        if (event.target === cartPopup) {
          cartPopup.style.display = 'none';
        }
      });
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      function addToCart(itemId) {
        var quantity = document.getElementById("quantityInput").value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add-to-cart.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
              Swal.fire("Added to Cart!");
            } else {
              console.error(response.message);
            }
          } else {
            console.error('Request failed. Status: ' + xhr.status);
          }
        };
        xhr.send('item_id=' + encodeURIComponent(itemId) + '&quantity=' + encodeURIComponent(quantity));
      }

      var addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
      addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
          event.preventDefault();
          var itemId = this.getAttribute('data-item-id');
          addToCart(itemId);
        });
      });

      var maxStocks = <?php echo $product['stocks']; ?>;

      var quantityInput = document.getElementById("quantityInput");

      quantityInput.value = 1;

      quantityInput.addEventListener('change', function() {
        // Check if the input value is less than 1
        if (quantityInput.value < 1) {
          quantityInput.value = 1;
        }
        if (quantityInput.value > maxStocks) {
          quantityInput.value = maxStocks;
        }
      });

      if (maxStocks === 0) {
        quantityInput.disabled = true;
        quantityInput.value = 0;
        addToCartButtons.forEach(function(button) {
          button.removeAttribute('href');
          button.setAttribute('disabled', true);
        });
      }
    });

    document.addEventListener('DOMContentLoaded', function() {
      if (sessionStorage.getItem('cartItems')) {
        cartItemsArray = JSON.parse(sessionStorage.getItem('cartItems'));
      }

      if (sessionStorage.getItem('totalCartPrice')) {
        totalCartPrice = parseFloat(sessionStorage.getItem('totalCartPrice'));
      }

      updateCartUI();

      var addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
      addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
          event.preventDefault();
          var itemId = this.getAttribute('data-item-id');
          addToCart(itemId);
        });
      });
    });

    function checkout() {
      window.location.href = 'checkout.php';
    }

    function clearCart() {
      <?php
      session_start();
      unset($_SESSION['cart']);
      ?>

      Swal.fire({
        title: "Cleared!",
        text: "Cart Cleared Successfully!",
        icon: "success"
      });

      window.location.reload();
    }
  </script>

</body>

</html>