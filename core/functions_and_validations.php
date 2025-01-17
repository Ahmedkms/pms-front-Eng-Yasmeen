<?php
// هنستخدم هنا الاكواد الخاصه بالتحقق من المدخلات  لتفدي تكرار اكواد الايرور

//   لو الحقل فاضي هيرجع خطأ لو مش فاضي و المدخلات صح هيسجل
function requiredVal($input){
    if(empty($input)){
        return false;
    }
    return true;
}

// التحقق من الحد الأدنى للطول
function minVal($input, $lenght){
    if(strlen($input) < $lenght){
        return false;
    }
    return true;
}

// التحقق من الحد الأقصى للطول
function maxVal($input, $lenght){
    if(strlen($input) > $lenght){
        return false;
    }
    return true;
}

// التحقق من صحة البريد الإلكتروني
function emailVal($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return false;
    }
    return true;
}

function sanitizeInput($input){
    return trim(htmlspecialchars(htmlentities($input)));
}


function redirect($path){
    header("location:$path");
}

// التحقق من أن المدخل عبارة عن رقم


# add to cart


// function addtocart($product_id, $product_name, $product_price, $product_quantity)
// {
//     $_SESSION['cart'][] = [
//         'product_id' => $product_id,
//         'product_name' => $product_name,
//         'product_price' => $product_price,
//         'product_quantity' => $product_quantity,
//     ];
//     $file = fopen('../Data/cart.csv', 'a');

//     $product_store = $product_id . ',' . $product_name . ',' . $product_price . ',' . $product_quantity;
//     fwrite($file, $product_store);

//     fclose($file);
// }







?>