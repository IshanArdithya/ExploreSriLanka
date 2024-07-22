<?php
session_start();

if (isset($_POST['item_id'], $_POST['quantity'])) {
    $itemId = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    if (!isset($_SESSION['cart'][$itemId])) {
        $_SESSION['cart'][$itemId] = $quantity;
    } else {
        $_SESSION['cart'][$itemId] += $quantity;
    }

    $response = [
        'success' => true,
        'itemCount' => count($_SESSION['cart'])
    ];
    echo json_encode($response);
} else {
    $response = [
        'success' => false,
        'message' => 'Item ID or quantity not provided'
    ];
    echo json_encode($response);
}
?>
