<?php
include('../config/configdb.php');
session_start();

$job_insert_btn = $_POST['job_insert_btn'];
$job_update_btn = $_POST['job_update_btn'];

$job_title = ucfirst($_POST['job_title']);
$company_name = $_POST['company_name'];
$company_image = $_FILES['company_image'];
$job_from = $_POST['job_from'];
$job_to = $_POST['job_to'];
$date = date('d-m-Y');
$id = $_GET['id'];
$delete_id = $_GET['delete_id'];


if(isset($job_insert_btn)){
    if($job_title && $company_name && $company_image && $job_from && $job_to){
        $temp_name = $company_image['tmp_name'];
        $image_name = $company_image['name'];
        $explode = explode(".", $image_name);
        $image_extension = end($explode);
        $date = date("d-m-Y");
        $time = date("h-i-s");
        $new_name =  $date."-".$job_title."-".$time.".".$image_extension;
        $base_path = "../uploads/job_images/".$new_name;
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
        if(in_array($image_extension,$allowedfileExtensions)){
            if(move_uploaded_file($temp_name,$base_path)){
                $intsert_query = "INSERT INTO jobs (job_title,company_name,company_image,job_from,job_to) VALUES ('$job_title','$company_name','$new_name','$job_from','$job_to')";
                mysqli_query($db_connect,$intsert_query);
                $_SESSION['job_success'] = "job information inserted";
                header("location: jobs.php");
            }else{
                $_SESSION['job_error'] = "sorry! file can't be uploaded";
                header("location: jobs.php");
            }
        }else{
            $_SESSION['job_error'] = "sorry! this image extension can not be accepted";
            header("location: jobs.php");
        }
        
        
    }else{
        $_SESSION['job_error'] = "sorry! please fill all field requirement first";
        header("location: jobs.php");
    }
}

if(isset($id)){
    $check_status_query = "SELECT * FROM jobs WHERE id='$id'";
    $check_status = mysqli_fetch_assoc(mysqli_query($db_connect,$check_status_query));
    if($check_status['status'] == 'deactive'){
        $update_query = "UPDATE jobs SET status='active' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['status_change'] = 'status successfully change to DEACTIVE to ACTIVE';
        header("location: jobs.php");
    }else{
        $update_query = "UPDATE jobs SET status='deactive' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['status_change'] = 'status successfully change to ACTIVE to DEACTIVE';
        header("location: jobs.php");
    }
}


if(isset($job_update_btn)){

    $job_title = ucfirst($_POST['job_title']);
    $company_name = $_POST['company_name'];
    $company_image = $_FILES['company_image'];
    $job_from = $_POST['job_from'];
    $job_to = $_POST['job_to'];
    $date = date('d-m-Y');
    $update_id = $_POST['job_id'];

    if(isset($update_id)){
        
            if($job_title){
                $update_query = "UPDATE jobs SET job_title='$job_title' WHERE id='$update_id'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['job_edit_success'] = "informations update successfully";
                header("location: jobs.php");
            }else{
                $_SESSION['job_edit_error'] = "sorry! edited field can't be empty";
                header("location: jobs.php");
            }
            if($company_name){
                $update_query = "UPDATE jobs SET company_name='$company_name' WHERE id='$update_id'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['job_edit_success'] = "informations update successfully";
                header("location: jobs.php");
            }else{
                $_SESSION['job_edit_error'] = "sorry! edited field can't be empty";
                header("location: jobs.php");
            }
            if($job_from){
                $update_query = "UPDATE jobs SET job_from='$job_from' WHERE id='$update_id'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['job_edit_success'] = "informations update successfully";
                header("location: jobs.php");
            }else{
                $_SESSION['job_edit_error'] = "sorry! edited field can't be empty";
                header("location: jobs.php");
            }
            if($job_to){
                $update_query = "UPDATE jobs SET job_from='$job_to' WHERE id='$update_id'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['job_edit_success'] = "informations update successfully";
                header("location: jobs.php");
            }else{
                $_SESSION['job_edit_error'] = "sorry! edited field can't be empty";
                header("location: jobs.php");
            }
       
                                 
    }else{
        $_SESSION['job_edit_error'] = "sorry! something is wrong";
        header("location: jobs.php");
    } 
    
    if(isset($company_image)){
        $image_new = $company_image['name'];
        $image_with_tempname = $company_image['tmp_name'];
        $image_explode = explode(".",$image_new);
        $image_extension = end($image_explode);
        $date = date("d-m-Y");
        $time = date("h-i-s");
        $new_name =  $date."-".$update_id."-".$company_name.".".$image_extension;
        $base_path = "../uploads/job_images/".$new_name;
        // $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
        
            if(move_uploaded_file($image_with_tempname,$base_path)){
                $update_query = "UPDATE testimonials SET company_image='$new_name' WHERE id='$update_id'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['job_edit_success'] = "informations update successfully";
                header("location: jobs.php");
            }else{
                $_SESSION['job_edit_error'] = "sorry! image can't uploaded";
                header("location: jobs.php");
            }
           
    }

}


if(isset($delete_id)){
    $delete_query = "DELETE FROM jobs WHERE id='$delete_id'";
    mysqli_query($db_connect,$delete_query);
    $_SESSION['job_delete'] = "jobs details delete successfully done";
    header("location: jobs.php");
}




?>