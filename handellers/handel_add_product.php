<?php
session_start();
if (!isset($_SESSION['auth']) || $_SESSION['auth']['role'] !== 'admin') {
    // إعادة التوجيه إذا لم يكن المستخدم مسجلاً كأدمن
    header('Location: ../NavItem/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // الحصول على بيانات المنتج من الفورم
    $product_name = htmlspecialchars(trim($_POST['product_name']));
    $product_price = number_format($_POST['product_price'] , 2);
    $product_quantity = ($_POST['product_quantity']);
    $errors = [];

    // التحقق من البيانات
    if (empty($product_name)) {
        $errors[] = "Product name is required";
    }
    if ($product_price <= 0) {
        $errors[] = "Product price must be greater than 0";
    }
    if ($product_quantity < 0) {
        $errors[] = "Product quantity cannot be negative";
    }

    if (empty($errors)) {
        // تخزين المنتج في ملف CSV
        $file_path = '../Data/products.csv';
        $file = fopen($file_path, 'a');
        fputcsv($file, [$product_name, $product_price, $product_quantity]);
        fclose($file);

        $_SESSION['success'] = ['product_name' => $product_name, 'product_price' => $product_price, 'product_quantity' => $product_quantity];
        header('Location: ../NavItem/add_product.php');
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        header('Location: ../NavItem/add_product.php');
        exit();
    }
}
?>