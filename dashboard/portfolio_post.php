<?php
include('../config/configdb.php');
session_start();

$name = $_POST['portfolio_name'] ;
$image = $_FILES['portfolio_image'] ;
$desciption = $_POST['portfolio_description'] ;
$insert_btn = $_POST['portfolio_btn'] ;
$status_btn = $_GET['id'] ;
$portfolio_update_btn = $_POST['portfolio_update_btn'];
$delete_btn = $_GET['delete_id'] ;




if(isset($insert_btn)){
    if($name && $image && $desciption){
        $temp_name = $image['tmp_name'];
        $image_name = $image['name'];
        $explode = explode(".", $image_name);
        $image_extension = end($explode);
        $date = date("d-m-Y");
        $time = date("h-i-s");
        $new_name =  $date."-".$name."-".$time.".".$image_extension;
        $base_path = "../uploads/portfolio_images/".$new_name;
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
        if(in_array($image_extension,$allowedfileExtensions)){
            if(move_uploaded_file($temp_name,$base_path)){
                $intsert_query = "INSERT INTO portfolios (name,image,description) VALUES ('$name','$new_name','$desciption')";
                mysqli_query($db_connect,$intsert_query);
                $_SESSION['portfolio_success'] = "Portfolio information inserted";
                header("location: portfolio.php");
            }else{
                $_SESSION['portfolio_error'] = "sorry! file can't be uploaded";
                header("location: portfolio.php");
            }
        }else{
            $_SESSION['portfolio_error'] = "sorry! this image extension can not be accepted";
            header("location: portfolio.php");
        }
        
        
    }else{
        $_SESSION['portfolio_error'] = "sorry! please fill all field requirement first";
        header("location: portfolio.php");
    }
}


if(isset($status_btn)){
    
     $select_query = "SELECT * FROM portfolios WHERE id='$status_btn'";
     $fetch_portfolio = mysqli_fetch_assoc(mysqli_query($db_connect,$select_query));
     if($fetch_portfolio['status'] == 'deactive'){
         $chnage_status_query = "UPDATE portfolios SET status='active' WHERE id='$status_btn'";
         mysqli_query($db_connect,$chnage_status_query);
         $_SESSION['portfolio_status_change'] = "status successfully change to DEACTIVE to ACTIVE";
         header("location: portfolio.php");
     }else{
        $chnage_status_query = "UPDATE portfolios SET status='deactive' WHERE id='$status_btn'";
         mysqli_query($db_connect,$chnage_status_query);
         $_SESSION['portfolio_status_change'] = "status successfully change to ACTIVE to DEACTIVE";
         header("location: portfolio.php");
     }
}

if(isset($delete_btn)){

    $delete_query = "DELETE FROM portfolios WHERE id='$delete_btn'";
    mysqli_query($db_connect,$delete_query);
    $_SESSION['portfolio_delete'] = "portfolio delete successfully done";
    header("location: portfolio.php");
}

if(isset($portfolio_update_btn)){

    $id = $_POST['portfolio_id'];
    $name = $_POST['portfolio_name'] ;
    $image = $_FILES['portfolio_image'] ;
    $desciption = $_POST['portfolio_description'] ;


    if($image){
        $image_with_name = $image['name'];
        $image_with_tempname = $image['tmp_name'];
        $image_explode = explode(".",$image_with_name);
        $image_extension = end($image_explode);
        $date = date("d-m-Y");
        $time = date("h-i-s");
        $new_name =  $date."-".$name."-".$time.".".$image_extension;
        $base_path = "../uploads/portfolio_images/".$new_name;
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
            if(move_uploaded_file($image_with_tempname,$base_path)){
                $update_query = "UPDATE portfolios SET image='$new_name' WHERE id='$id'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['portfolio_edit_success'] = "informations update successfully";
                header("location: portfolio.php");
            }else{
                $_SESSION['portfolio_edit_error'] = "sorry! image can't uploaded";
                header("location: portfolio.php");
            }
        }
        if($name){
            $update_query = "UPDATE portfolios SET name='$name' WHERE id='$id'";
            mysqli_query($db_connect,$update_query);
            $_SESSION['portfolio_edit_success'] = "informations update successfully";
            header("location: portfolio.php");
        }else{
            $_SESSION['portfolio_edit_error'] = "sorry! edited field can't be empty";
            header("location: portfolio.php");
        }
    
        if($desciption){
            $update_query = "UPDATE portfolios SET description='$desciption' WHERE id='$id'";
            mysqli_query($db_connect,$update_query);
            $_SESSION['portfolio_edit_success'] = "informations update successfully";
            header("location: portfolio.php");
        }else{
            $_SESSION['portfolio_edit_error'] = "sorry! edited field can't be empty";
            header("location: portfolio.php");
        }



}



?>