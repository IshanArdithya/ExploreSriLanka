<?php
session_start();

// Check if item ID and quantity are provided
if (isset($_POST['item_id'], $_POST['quantity'])) {
    $itemId = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    // Check if the item is already in the cart
    if (!isset($_SESSION['cart'][$itemId])) {
        // If not, add the item to the cart with the specified quantity
        $_SESSION['cart'][$itemId] = $quantity;
    } else {
        // If the item is already in the cart, increment its quantity by the specified amount
        $_SESSION['cart'][$itemId] += $quantity;
    }

    // Send a JSON response indicating success and the updated item count
    $response = [
        'success' => true,
        'itemCount' => count($_SESSION['cart'])
    ];
    echo json_encode($response);
} else {
    // If item ID or quantity is not provided, send an error response
    $response = [
        'success' => false,
        'message' => 'Item ID or quantity not provided'
    ];
    echo json_encode($response);
}
?>
