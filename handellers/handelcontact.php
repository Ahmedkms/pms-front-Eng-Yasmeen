<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include '../core/functions_and_validations.php' ;



$errors = [] ;
//echo "done" ;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$name = trim($_POST['name']);
$name= htmlspecialchars(htmlentities($name));
$email = trim($_POST['email']);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$email = htmlspecialchars($email);
$message = trim($_POST['message']);
$message = htmlspecialchars(htmlentities($message));

$errors = [];
if(empty($name)){

    $errors[] = 'sorry..! name is required';
}
if(empty($email)){
    $errors[] = 'sorry..! email is required';
}
if(empty($message)){

$errors [] = 'sorry..! message is required ';

}

if(empty($errors)){

$_SESSION['user_info'] = [
    'name' => $name ,
    'email' => $email ,
    'message'=> $message ,
    
];
header('location:../NavItem/index.php');
exit;
}
$_SESSION['errors'] = $errors;
}    
header('location:../NavItem/contact.php');

?>