<?php
include("../config/configdb.php");
session_start();

$name = $_POST['name'];
$name_pattern = "/^[a-zA-Z_\s]*$/";
$email = $_POST['email'];
$password = $_POST['password'];


if ($name) {
    if (!preg_match($name_pattern, $name)) {
        $_SESSION['old_name'] = $name;
        $_SESSION['name_error'] = 'this name must be alphabatic character';
        header("location: home.php");
    } else {
        echo $name;
    }
} else {
    $_SESSION['name_error'] = 'name is missing';
    header("location: home.php");
}

if ($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email_error'] = 'invalid email';
        $_SESSION['old_email'] = $email;
        header("location: home.php");
    } else {
        echo $email;
    }
} else {
    $_SESSION['email_error'] = 'email is missing';
    header("location: home.php");
}


if ($password) {
    if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
        $_SESSION['old_password'] = $password;
        $_SESSION['password_error'] = 'please use strong password';
        header("location: home.php");
    } else {
        echo $password;
    }
} else {
    $_SESSION['password_error'] = 'password is missing';
    header("location: home.php");
}

if($name && $email && $password){
    $encript_password = sha1($password);
    $insert_query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$encript_password')";
    mysqli_query($db_connect,$insert_query);
    $_SESSION['session_name'] = $name;
    $_SESSION['registration_successfull'] = 'new user create successfull';
    header("location: home.php");
}

?>