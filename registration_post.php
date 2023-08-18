<?php
include("./config/configdb.php");
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$name_pattern = "/^[a-zA-Z_\s]*$/";


if ($name) {
    if (!preg_match($name_pattern, $name)) {
        $_SESSION['old_name'] = $name;
        $_SESSION['name_error'] = 'this name must be alphabatic character';
        header("location: registration.php");
    } else {
        echo $name;
    }
} else {
    $_SESSION['name_error'] = 'name is missing';
    header("location: registration.php");
}

if ($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email_error'] = 'invalid email';
        $_SESSION['old_email'] = $email;
        header("location: registration.php");
    } else {
        echo $email;
    }
} else {
    $_SESSION['email_error'] = 'email is missing';
    header("location: registration.php");
}


if ($password) {
    if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
        $_SESSION['old_password'] = $password;
        $_SESSION['password_error'] = 'please use strong password';
        header("location: registration.php");
    } else {
        echo $password;
    }
} else {
    $_SESSION['password_error'] = 'password is missing';
    header("location: registration.php");
}

if ($confirm_password) {
    if ($password != $confirm_password) {
        $_SESSION['old_c_password'] = $confirm_password;
        $_SESSION['password_confirmation_error'] = 'password is not matched';
        header("location: registration.php");
    } else {
        echo $confirm_password;
    }
} else {
    $_SESSION['password_confirmation_error'] = 'confirmation password is missing';
    header("location: registration.php");
}

if ($name && $email && $password && $confirm_password) {


    $email_validity_query = "SELECT COUNT(*) AS 'validity' FROM users WHERE email='$email'";
    $email_validity_query_connect = mysqli_query($db_connect, $email_validity_query);

    // print_r(mysqli_fetch_assoc($email_validity_query_connect)['validity']);

    if (mysqli_fetch_assoc($email_validity_query_connect)['validity'] == 0) {
        $encrypt_password = sha1($password);
        $insert_query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$encrypt_password')";

        $_SESSION['session_name'] = $name;
        $_SESSION['session_email'] = $email;
        $_SESSION['session_password'] = $password;
        $_SESSION['registration_success'] = 'Thanks for signing up';

        mysqli_query($db_connect, $insert_query);

        header("location: login.php");
    } else {
        $_SESSION['email_not_valid'] = 'sorry, your given email already exists';
        header("location: registration.php");
    }
}
