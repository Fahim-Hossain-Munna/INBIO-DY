<?php
include("../config/configdb.php");
session_start();


if(isset($_POST['change_name'])){
    $name = $_POST['name'];
    $name_pattern = "/^[a-zA-Z_\s]*$/";
    $user_id = $_SESSION['admin_user_id'];
    if ($name) {
        if (!preg_match($name_pattern, $name)) {
            $_SESSION['old_name'] = $name;
            $_SESSION['name_error'] = 'this name must be alphabatic character';
            header("location: profile.php");
        } else {
            $update_query = "UPDATE users SET name='$name' WHERE id='$user_id'";
            mysqli_query($db_connect,$update_query);
            $_SESSION['update_successful'] = 'new name successfully updated';
            $_SESSION['admin_user_name'] = $name;
            header("location: profile.php");
        }
    } else {
        $_SESSION['name_error'] = 'name is missing';
        header("location: profile.php");
    }
    
}


if(isset($_POST['change_password'])){
    if($_POST['current_password'] && $_POST['new_password'] && $_POST['confirm_password']){
        $user_id = $_SESSION['admin_user_id'];
        $encrypt_current_password = sha1($_POST['current_password']);
        $password_match_query = "SELECT COUNT(*) as password_check FROM users WHERE id='$user_id' AND password='$encrypt_current_password' ";
        $password_match_query_connect =mysqli_fetch_assoc(mysqli_query($db_connect,$password_match_query))["password_check"] ;
         if($password_match_query_connect){
            $current_password = $_POST['current_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];
            if($new_password){
                if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$new_password)){
                    // if($new_password == $confirm_password){
                    //     $encypt_pass = sha1($new_password);
                    //     $user_id = $_SESSION['admin_user_id'];
                    //     $update_password_query = "UPDATE users SET password='$encypt_pass' WHERE id='$user_id'";
                    //     mysqli_query($db_connect,$update_password_query);
                    //     $_SESSION['update_pass_update'] = "password update successfull";
                    //     header("location: profile.php");
                    // }else{
                    //     $_SESSION['update_pass_error'] = "sorry! password can't match with new password";
                    //     header("location: profile.php");
                    // }
                    if($current_password != $new_password){
                        if($new_password == $confirm_password){
                            $encypt_pass = sha1($new_password);
                            $user_id = $_SESSION['admin_user_id'];
                            $update_password_query = "UPDATE users SET password='$encypt_pass' WHERE id='$user_id'";
                            mysqli_query($db_connect,$update_password_query);
                            $_SESSION['update_pass_update'] = "password update successfull";
                            header("location: profile.php");
                        }else{
                            $_SESSION['update_pass_error'] = "sorry! password can't match with new password";
                            header("location: profile.php");
                        }
                    }else{
                        $_SESSION['update_pass_error'] = "sorry! you should use one password in one time.";
                        header("location: profile.php");
                    }
                }else{
                    $_SESSION['update_pass_error'] = "sorry! password is not valid";
                    header("location: profile.php");
                }
            }else{
                $_SESSION['update_pass_error'] = "sorry! new password field is missing";
                header("location: profile.php");
            }
         }else{
            $_SESSION['update_pass_error'] = "sorry! current password can't match";
            header("location: profile.php");
         }
    }else{
        $_SESSION['update_pass_error'] = "sorry! password field can't be NULL";
        header("location: profile.php");
    }
}



if(isset($_POST['change_image'])){
    $image = $_FILES['image']['name'];
    if($image){
        $user_id = $_SESSION['admin_user_id'];
        $user_name = $_SESSION['admin_user_name'];


        $image_explode = explode(".",$image);
        $image_extension = end( $image_explode);
        $date = date("d-m-Y");
        $time = date("h-i-s");
        $new_name = $date."-".$user_name."-".$user_id."-".$time.".".$image_extension;
        
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
        if(in_array($image_extension, $allowedfileExtensions)){
            $image_temp = $_FILES['image']['tmp_name'];
            $base_path = "../uploads/profile_images/".$new_name;
            if(move_uploaded_file($image_temp,$base_path)){
                $image_update_query = "UPDATE users SET image='$new_name' WHERE id='$user_id'";
                mysqli_query($db_connect,$image_update_query);
                $_SESSION['admin_user_picture'] = $new_name;
                $_SESSION['update_image_success'] = "Image Uploaded Successfull";
                header("location: profile.php");
                
            }else{
                $_SESSION['update_image_error'] = "sorry! something is wrong, file can't upload";
                header("location: profile.php");
            }
            
        }else{
            $_SESSION['update_image_error'] = "sorry! image extension can't allow";
            header("location: profile.php");
        }
    }else{
        $_SESSION['update_image_error'] = "sorry! database can't find any images";
        header("location: profile.php");
    }    
}



if(isset($_POST['change_contact'])){
    $user_id = $_SESSION['admin_user_id'];
    $contact = $_POST['contact'];
    if($contact){
        $insert_contact = "UPDATE users SET contact='$contact' WHERE id='$user_id'";
        mysqli_query($db_connect,$insert_contact);
        $_SESSION['update_contact_success'] = "contact number update succesfully";
        header("location: profile.php");
    }else{
        $_SESSION['update_contact_error'] = "sorry! contact field can't be empty";
        header("location: profile.php");
    }
}

if(isset($_POST['change_address'])){
    $user_id = $_SESSION['admin_user_id'];
    $address = $_POST['address'];
    if($address){
        $insert_address = "UPDATE users SET address='$address' WHERE id='$user_id'";
        mysqli_query($db_connect,$insert_address);
        $_SESSION['update_address_success'] = "address update succesfully";
        header("location: profile.php");
    }else{
        $_SESSION['update_address_error'] = "sorry! address field can't be empty";
        header("location: profile.php");
    }
}

if(isset($_POST['change_about'])){
    $user_id = $_SESSION['admin_user_id'];
    $about = $_POST['about'];
    if($about){
        $insert_about = "UPDATE users SET about='$about' WHERE id='$user_id'";
        mysqli_query($db_connect,$insert_about);
        $_SESSION['update_about_success'] = "about you update succesfully";
        header("location: profile.php");
    }else{
        $_SESSION['update_about_error'] = "sorry! about field can't be empty";
        header("location: profile.php");
    }
}