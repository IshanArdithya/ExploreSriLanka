<?php

require_once 'config.php';

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

$customerEmail = $_SESSION['customer_email'] ?? '';
if (!empty($customerEmail)) {
    $stmt = $pdo->prepare("SELECT first_name, last_name, email FROM customers WHERE email = ?");
    $stmt->execute([$customerEmail]);
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);

    $firstName = $customer['first_name'] ?? '';
    $lastName = $customer['last_name'] ?? '';
    $email = $customer['email'] ?? '';
} else {
    $firstName = '';
    $lastName = '';
    $email = '';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $streetAddress = $_POST['street'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $contactNumber2 = $_POST['contactNumber2'];
    $specialNotes = $_POST['specialNotes'];

    //doing this to calc total price
    $totalPrice = 0;
    $itemsString = '';
    $cart = $_SESSION['cart'] ?? array();
    foreach ($cart as $itemId => $quantity) {
        $stmt = $pdo->prepare("SELECT item_id, item_price FROM shopitems WHERE item_id = ?");
        $stmt->execute([$itemId]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
        $subtotal = $item['item_price'] * $quantity;
        $totalPrice += $subtotal;

        $itemsString .= $item['item_id'] . '*' . $quantity . ', ';
    }

    $itemsString = rtrim($itemsString, ', ');

    $stmt = $pdo->prepare("INSERT INTO shoporders (customer_name, street_address, district, city, email, contact_number, contact_number2, special_notes, items, totalprice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$firstName . ' ' . $lastName, $streetAddress, $district, $city, $email, $contactNumber, $contactNumber2, $specialNotes, $itemsString, $totalPrice]);

    unset($_SESSION['cart']);

    header("Location: shop.php?status=success");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Explore Sri Lanka</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="css/checkout.css"> -->

</head>

<body>

    <!-- Header -->
    <?php
    include 'components/header.php';
    ?>


    <div class="top-image">
        <h1 class="headings sub-heading"></h1>
    </div>

    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="../index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
                <li class="active">Checkout</li>
            </ol>
        </div>
        <!-- <span id="closeIcon" class="close-icon" onclick="closeCheckout()">X</span> -->

        <div class="checkout-main-container">
        <div class="checkout-summary-form">
            <h2 class="checkout-sub-title">Checkout</h2>
            <form id="checkoutForm" method="post">
                <div class="checkout-name-row">
                    <input type="text" id="firstname" name="firstname" placeholder="First Name" value="<?php echo htmlspecialchars($firstName); ?>" <?php echo !empty($firstName) ? 'readonly' : ''; ?> required>
                    <input type="text" id="lastname" name="lastname" placeholder="Last Name" value="<?php echo htmlspecialchars($lastName); ?>" <?php echo !empty($lastName) ? 'readonly' : ''; ?> required>
                </div>

                <input type="text" id="street" name="street" placeholder="Street Address" required>
                <input type="text" id="district" name="district" placeholder="District" required>
                <input type="text" id="city" name="city" placeholder="City" required>
                <input type="email" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" <?php echo !empty($email) ? 'readonly' : ''; ?> required>

                <input type="tel" id="contactNumber" name="contactNumber" placeholder="Contact Number" required>
                <input type="tel" id="contactNumber2" name="contactNumber2" placeholder="Contact Number 2 (Optional)">
                <textarea id="specialNotes" name="specialNotes" placeholder="Special Notes"></textarea>
            </form>
        </div>

        <div class="checkout-order-summary">
            <h2>Order Summary</h2>

            <div class="checkout-item-list">
                <div class="checkout-item-table">
                    <div class="checkout-table-row">
                        <div class="checkout-item-name">Product Name</div>
                        <div class="subtotal">Subtotal</div>
                    </div>
                    <?php
                    $cart = $_SESSION['cart'] ?? array();
                    $total = 0;

                    foreach ($cart as $itemId => $quantity) {
                        $stmt = $pdo->prepare("SELECT item_name, item_price FROM shopitems WHERE item_id = ?");
                        $stmt->execute([$itemId]);
                        $item = $stmt->fetch(PDO::FETCH_ASSOC);

                        $subtotal = $item['item_price'] * $quantity;
                        $total += $subtotal;

                        echo '<div class="checkout-table-row">';
                        echo '<div class="checkout-item-name">' . htmlspecialchars($item['item_name']) . ' x ' . $quantity . '</div>';
                        echo '<div class="subtotal">LKR. ' . number_format($subtotal, 2) . '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div class="checkout-total-row">
                <span class="checkout-total-label">Total:</span>
                <span class="checkout-total-price">LKR. <?php echo number_format($total, 2); ?></span>
            </div>

            <button class="place-order-btn" type="button" onclick="submitForm()">Place Order</button>
        </div>
    </div>

    </div>
</body>
<script>
    function submitForm() {
        document.getElementById("checkoutForm").submit();
    }
</script>

<!-- Footer -->
<?php include 'components/footer.php'; ?>

</body>


</html>