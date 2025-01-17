<?php
$title = 'Add Product';
if (session_status() == PHP_SESSION_NONE) session_start();

// تأكد من أن المستخدم هو أدمن
if (!isset($_SESSION['auth']) || $_SESSION['auth']['role'] != 'admin') {
    header('Location: ../NavItem/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = htmlspecialchars(trim($_POST['product_name']));
    $product_price = htmlspecialchars(trim($_POST['product_price']));
    $product_quantity = htmlspecialchars(trim($_POST['product_quantity']));

    // التحقق من رفع الصورة
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $image_name = $_FILES['product_image']['name'];
        $image_tmp_name = $_FILES['product_image']['tmp_name'];
        $image_size = $_FILES['product_image']['size'];
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);

        // تحديد مسار رفع الصورة
        $upload_dir = '../uploads/';
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array(strtolower($image_ext), $allowed_extensions)) {
            $errors[] =- "Invalid image type. Allowed types: jpg, jpeg, png, gif.";
            exit();
        }

        if ($image_size > 2 * 1024 * 1024) { // حجم الصورة لا يزيد عن 2 ميجابايت
            echo "Image size is too large. Max size is 2MB.";
            exit();
        }

        $new_image_name = uniqid('product_', true) . '.' . $image_ext;
        $upload_path = $upload_dir . $new_image_name;

        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true); // إنشاء مجلد إذا لم يكن موجودًا
        }

        if (move_uploaded_file($image_tmp_name, $upload_path)) {
            echo "Image uploaded successfully: $new_image_name";
        } else {
            echo "Failed to upload image.";
            exit();
        }
    } else {
        echo "No image uploaded.";
    }

    // إضافة البيانات إلى CSV أو أي معالجة أخرى
    $file = fopen('../Data/products.csv', 'a');
    fputcsv($file, [$product_name, $product_price, $product_quantity, $new_image_name ?? '']);
    fclose($file);

    echo "Product added successfully!";
}
?>

    <h1>Add Product</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" id="product_name" required><br><br>

        <label for="product_price">Product Price:</label>
        <input type="number" name="product_price" id="product_price" step="0.01" required><br><br>

        <label for="product_quantity">Product Quantity:</label>
        <input type="number" name="product_quantity" id="product_quantity" required><br><br>

        <label for="product_image">Product Image:</label>
        <input type="file" name="product_image" id="product_image" accept="image/*"><br><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>