<?php
include("../config/configdb.php");
session_start();

$id = $_GET['id'];
$delete_btn = $_GET['delete_id'];
$testimonial_update_btn = $_POST['testimonial_update_btn'];
$client_company = $_POST['client_company'];
$client_name = $_POST['client_name'];
$client_image = $_FILES['client_image'];
$client_designation = $_POST['client_designation'];
$feedback_subject = $_POST['feedback_subject'];
$working_form = $_POST['working_form'];
$working_to = $_POST['working_to'];
$feedback_message = $_POST['feedback_message'];
$insert_btn = $_POST['testi_insert_btn'];
$date = date("d-m-Y");

$image_explode = explode(".",$client_image['name']);
$image_extension = end($image_explode);
$image_name = $client_name."-".$client_company."-".$date.".".$image_extension;
$image_tmp_name = $client_image['tmp_name'];
$image_base_path = "../uploads/testimonial_images/".$image_name;
$allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');


if(isset($insert_btn)){
    if($client_name && $client_image && $client_designation && $feedback_subject && $working_form && $working_to && $feedback_message && $client_company){
        if(in_array($image_extension,$allowedfileExtensions)){
            if(move_uploaded_file($image_tmp_name,$image_base_path)){
                $date = date("d-m-Y");
                $intsert_query = "INSERT INTO testimonials(client_name, client_image, client_designation,client_company,feedback_subject,working_form,working_to,feedback_message,date) VALUES ('$client_name','$image_name','$client_designation','$client_company','$feedback_subject','$working_form','$working_to','$feedback_message','$date')";
                mysqli_query($db_connect,$intsert_query);
                $_SESSION['testimonial_success'] = "testimonial information inserted";
                header("location: testimonial.php");
            }else{
                $_SESSION['testimonial_edit_error'] = "sorry! file can't uploaded";
                header("location: testimonial.php");
            }

        }else{
            $_SESSION['testimonial_edit_error'] = "sorry! image extensions can't accepted";
            header("location: testimonial.php");
        }

    }else{
        $_SESSION['testimonial_edit_error'] = "sorry! testimonials field can't be empty";
        header("location: testimonial.php");
    }
}

if(isset($id)){
    $check_status = "SELECT * FROM testimonials WHERE id='$id' ";
    $get_status =mysqli_fetch_assoc(mysqli_query($db_connect,$check_status));

    if($get_status['status'] == 'deactive' ){
        $chnage_status_query = "UPDATE testimonials SET status='active' WHERE id='$id'";
         mysqli_query($db_connect,$chnage_status_query);
         $_SESSION['testimonial_status_change'] = "status successfully change to DEACTIVE to ACTIVE";
         header("location: testimonials_list.php");
    }else{
        $chnage_status_query = "UPDATE testimonials SET status='deactive' WHERE id='$id'";
         mysqli_query($db_connect,$chnage_status_query);
         $_SESSION['testimonial_status_change'] = "status successfully change to ACTIVE to DEACTIVE";
         header("location: testimonials_list.php");
    }
}


if(isset($delete_btn)){
    $delete_query = "DELETE FROM testimonials WHERE id='$delete_btn'";
    mysqli_query($db_connect,$delete_query);
    $_SESSION['testimonial_delete'] = "testimonial delete successfully done";
    header("location: testimonials_list.php");
}


if(isset($testimonial_update_btn)){

    $client_name = $_POST['client_name'];
    $client_company = $_POST['client_company'];
    $client_image = $_FILES['client_image'];
    $client_designation = $_POST['client_designation'];
    $feedback_subject = $_POST['feedback_subject'];
    $working_form = $_POST['working_form'];
    $working_to = $_POST['working_to'];
    $feedback_message = $_POST['feedback_message'];
    $id_test = $_POST['testimonial_id'];

    if(isset($id_test)){
        
            if($client_name){
                $update_query = "UPDATE testimonials SET client_name='$client_name', date='$date' WHERE id='$id_test'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['testimonial_edit_success'] = "informations update successfully";
                header("location: testimonials_list.php");
            }else{
                $_SESSION['testimonial_edit_error'] = "sorry! edited field can't be empty";
                header("location: testimonials_list.php");
            }
            if($client_company){
                $update_query = "UPDATE testimonials SET client_company='$client_company',date='$date' WHERE id='$id_test'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['testimonial_edit_success'] = "informations update successfully";
                header("location: testimonials_list.php");
            }else{
                $_SESSION['testimonial_edit_error'] = "sorry! edited field can't be empty";
                header("location: testimonials_list.php");
            }
            if($client_designation){
                $update_query = "UPDATE testimonials SET client_designation='$client_designation',date='$date' WHERE id='$id_test'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['testimonial_edit_success'] = "informations update successfully";
                header("location: testimonials_list.php");
            }else{
                $_SESSION['testimonial_edit_error'] = "sorry! edited field can't be empty";
                header("location: testimonials_list.php");
            }
            if($feedback_subject){
                $update_query = "UPDATE testimonials SET feedback_subject='$feedback_subject',date='$date' WHERE id='$id_test'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['testimonial_edit_success'] = "informations update successfully";
                header("location: testimonials_list.php");
            }else{
                $_SESSION['testimonial_edit_error'] = "sorry! edited field can't be empty";
                header("location: testimonials_list.php");
            }
            if($working_form){
                $update_query = "UPDATE testimonials SET working_form='$working_form',date='$date' WHERE id='$id_test'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['testimonial_edit_success'] = "informations update successfully";
                header("location: testimonials_list.php");
            }else{
                $_SESSION['testimonial_edit_error'] = "sorry! edited field can't be empty";
                header("location: testimonials_list.php");
            }
            
            if($working_to){
                $update_query = "UPDATE testimonials SET working_to='$working_to',date='$date' WHERE id='$id_test'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['testimonial_edit_success'] = "informations update successfully";
                header("location: testimonials_list.php");
            }else{
                $_SESSION['testimonial_edit_error'] = "sorry! edited field can't be empty";
                header("location: testimonials_list.php");
            }
            if($feedback_message){
                $update_query = "UPDATE testimonials SET feedback_message='$feedback_message',date='$date' WHERE id='$id_test'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['testimonial_edit_success'] = "informations update successfully";
                header("location: testimonials_list.php");
            }else{
                $_SESSION['testimonial_edit_error'] = "sorry! edited field can't be empty";
                header("location: testimonials_list.php");
            }
                                 
    }else{
        $_SESSION['testimonial_edit_error'] = "sorry! something is wrong";
        header("location: testimonials_list.php");
    } 
    
    if(isset($_FILES['client_image'])){
        $image_new = $client_image['name'];
        $image_with_tempname = $client_image['tmp_name'];
        $image_explode = explode(".",$image_new);
        $image_extension = end($image_explode);
        $date = date("d-m-Y");
        $time = date("h-i-s");
        $new_name =  $date."-".$client_name."-".$time.".".$image_extension;
        $base_path = "../uploads/testimonial_images/".$new_name;
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
        
            if(move_uploaded_file($image_with_tempname,$base_path)){
                $update_query = "UPDATE testimonials SET client_image='$new_name',date='$date' WHERE id='$id_test'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['testimonial_edit_success'] = "informations update successfully";
                header("location: testimonials_list.php");
            }else{
                $_SESSION['testimonial_edit_error'] = "sorry! image can't uploaded";
                header("location: testimonials_list.php");
            }
           
    }

}






?>