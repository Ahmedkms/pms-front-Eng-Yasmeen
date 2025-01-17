<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include '../core/functions_and_validations.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_email = htmlspecialchars(htmlentities(trim($_POST['email'])));
    $user_password = htmlspecialchars(htmlentities(trim($_POST['password'])));
    $user_password = password_hash($user_password, PASSWORD_DEFAULT);


    /* var_dump($_POST);
     var_dump($_POST['useremail']);
     var_dump($_POST['userpassword']); */


    $errors = [];


    # validation of email 

    if (!isset($_POST['email']) || empty($email)) {
        $errors[] = 'sorry email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'sorry email is not valid';
    }

    # validation of password 

    if (!isset($_POST['password']) || empty($password)) {
        $errors[] = 'sorry password is required';
    } elseif (strlen($password) < 8) {
        $errors[] = 'sorry password must be greater than 8 char';
    } elseif (strlen($password) > 10) {
        $errors[] = 'sorry password must be less than 10 char';
    }

    # validation of login with data

    if (empty($errors)) {
        $_SESSION['login'] = ['email' => $email, 'password' => $password];
        $file_read = fopen('../Data/userdata.csv', 'r');

        while ($row = fgetcsv($file_read)) {

            if ($_SESSION['login']['email'] == $row[1] && $_SESSION['login']['password'] == $row[2]) {
                header('location:../NavItem/index.php');
            }
            header('location:../NavItem/login.php');
        }
        fclose($file_read);
    }
    header('location:../NavItem/login.php');
}

?>






















?>