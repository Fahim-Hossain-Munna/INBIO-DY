<?php
include('../config/configdb.php');
session_start();

$name = $_POST['feature_name'] ;
$icon = $_POST['feature_icon'] ;
$desciption = $_POST['feature_description'] ;
$insert_btn = $_POST['feature_btn'] ;
$status_btn = $_GET['id'] ;
$date = date("d-m-Y");
$feature_update_btn = $_POST['feature_update_btn'];
$delete_btn = $_GET['delete_id'] ;




if(isset($insert_btn)){
    if($name && $icon && $desciption){
        $intsert_query = "INSERT INTO features (name,icon,description,date) VALUES ('$name','$icon','$desciption','$date')";
        mysqli_query($db_connect,$intsert_query);
        $_SESSION['feature_success'] = "feature information inserted";
        header("location: feature.php");  
    }else{
        $_SESSION['feature_error'] = "sorry! please fill all field requirement first";
        header("location: feature.php");
    }
}


if(isset($status_btn)){
    
     $select_query = "SELECT * FROM features WHERE id='$status_btn'";
     $fetch_feature = mysqli_fetch_assoc(mysqli_query($db_connect,$select_query));
     if($fetch_feature['status'] == 'deactive'){
         $chnage_status_query = "UPDATE features SET status='active' WHERE id='$status_btn'";
         mysqli_query($db_connect,$chnage_status_query);
         $_SESSION['features_status_change'] = "status successfully change to DEACTIVE to ACTIVE";
         header("location: feature.php");
     }else{
        $chnage_status_query = "UPDATE features SET status='deactive' WHERE id='$status_btn'";
         mysqli_query($db_connect,$chnage_status_query);
         $_SESSION['features_status_change'] = "status successfully change to ACTIVE to DEACTIVE";
         header("location: feature.php");
     }
}

if(isset($delete_btn)){

    $delete_query = "DELETE FROM features WHERE id='$delete_btn'";
    mysqli_query($db_connect,$delete_query);
    $_SESSION['feature_delete'] = "portfolio delete successfully done";
    header("location: feature.php");
}

if(isset($feature_update_btn)){

    $id = $_POST['feature_id'];
    $name = $_POST['feature_name'] ;
    $icon = $_POST['feature_icon'] ;
    $desciption = $_POST['feature_description'] ;
    $date = date("d-m-Y");


        if($name){
            $update_query = "UPDATE features SET name='$name',date='$date' WHERE id='$id'";
            mysqli_query($db_connect,$update_query);
            $_SESSION['feature_edit_success'] = "informations update successfully";
            header("location: feature.php");
        }else{
            $_SESSION['feature_edit_error'] = "sorry! edited field can't be empty";
            header("location: feature.php");
        }
        if($icon){
            $update_query = "UPDATE features SET icon='$icon',date='$date' WHERE id='$id'";
            mysqli_query($db_connect,$update_query);
            $_SESSION['feature_edit_success'] = "informations update successfully";
            header("location: feature.php");
        }else{
            $_SESSION['feature_edit_error'] = "sorry! edited field can't be empty";
            header("location: feature.php");
        }
    
        if($desciption){
            $update_query = "UPDATE features SET description='$desciption',date='$date' WHERE id='$id'";
            mysqli_query($db_connect,$update_query);
            $_SESSION['feature_edit_success'] = "informations update successfully";
            header("location: feature.php");
        }else{
            $_SESSION['feature_edit_error'] = "sorry! edited field can't be empty";
            header("location: feature.php");
        }

}



?>