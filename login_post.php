<?php
include("./config/configdb.php");
session_start();

$email = $_POST['email'];
$password = sha1($_POST['password']);

if ($email && $password) {
    $select_query = "SELECT COUNT(*) AS 'result' FROM users WHERE email='$email' AND password='$password'";
    $connect_db = mysqli_query($db_connect, $select_query);

    if (mysqli_fetch_assoc($connect_db)['result'] == 1) {
        $single_user_query = "SELECT id,name,email,image FROM `users` WHERE email='$email'";
        $single_user_query_connect = mysqli_query($db_connect, $single_user_query);

        $user = mysqli_fetch_assoc($single_user_query_connect);


        $_SESSION['login_success'] = 'login successfull';
        $_SESSION['admin_user_id'] = $user['id'];
        $_SESSION['admin_user_name'] = $user['name'];
        $_SESSION['admin_user_email'] = $user['email'];
        $_SESSION['admin_user_picture'] = $user['image'];
        header("location: ./dashboard/home.php");
    } else {
        $_SESSION['login_error'] = 'your given information is wrong';
        header("location: login.php");
    }
}
