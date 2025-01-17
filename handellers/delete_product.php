<?php
if(session_status() == PHP_SESSION_NONE) session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    // التحقق إذا كانت السلة موجودة
    if (isset($_SESSION['cartdata'])) {
        // الحصول على id المنتج اللي هتحذفه
        $product_id = $_POST['product_id'];

        // البحث عن المنتج في السلة وحذفه
        foreach ($_SESSION['cartdata'] as $key => $cart_item) {
            if ($cart_item['product_id'] == $product_id) {
                // إزالة المنتج من السلة
                unset($_SESSION['cartdata'][$key]);
                break;  // التوقف عن البحث بعد الحذف
            }
        }
        
        // إعادة ترتيب المصفوفة بعد الحذف
        $_SESSION['cartdata'] = array_values($_SESSION['cartdata']);
        
        // التوجيه إلى صفحة السلة
        header('Location:../NavItem/cart.php');
        exit();
    } else {
        // إذا السلة فارغة أو غير موجودة
        $errors[] = "Cart is empty!";
    }
} else {
    // إذا لم يتم إرسال الطلب بشكل صحيح
      $errors[] = "Invalid request!";
}
?>