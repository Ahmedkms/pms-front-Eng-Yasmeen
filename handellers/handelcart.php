<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include '../core/functions_and_validations.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_quantity'])) {

        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];

        if (!isset($_POST['cartdata'])) {
            $_SESSION['cartdata'] = [];
        }
        $cart_item = [

            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_quantity' => $product_quantity
        ];

        $_SESSION['cartdata'][] = $cart_item;
        header('location:../NavItem/cart.php');
        exit();
    }
}
?>































?>