<?php
if(session_status() == PHP_SESSION_NONE)session_start();

include ('../core/functions_and_validations.php');

$errors = [];

if ($_SERVER["REQUEST_METHOD"]=="POST" ){

    foreach ($_POST as $key => $value){
        $$key = sanitizeInput($value);
    }

    if (!requiredVal($name)){
        $errors[] = "name is required";
    }elseif (!minVal($name, 3)){
        $errors[] = "name must be more than 3 chars";
    }elseif (!maxVal($name, 25)){
        $errors[] = "name must be less than 25 chars";
    }

    if (!requiredVal($email)){
        $errors[] = "email is required";
    }elseif (!emailVal($email)){
        $errors[] = "please enter a valid email";   
    }

    if (!requiredVal($message)){
        $errors[] = "message is required";
    }elseif (!minVal($message, 20)){
        $errors[] = "message must be more than 20 chars";
    }elseif (!maxVal($message, 100)){
        $errors[] = "message must be less than 100 chars";

    }


    //handel errors
    if (empty($errors)){
        $messges_file = fopen("../Data/messages.csv", "a");
        $ms_data = [$name,$email,$message];
        fputcsv($messges_file, $ms_data);
        fclose($messges_file);

        $_SESSION['success'] = "Message sent successfully!";
        redirect("../NavItem/contact.php");
        die();
    }
    // in the case of every thing is ok
    else {
        $_SESSION['errors'] = $errors;
        redirect("../NavItem/contact.php");
        die;

    }

}