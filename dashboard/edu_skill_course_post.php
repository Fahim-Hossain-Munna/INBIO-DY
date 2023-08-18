<?php
include('../config/configdb.php');
session_start();

$id = $_GET['id'];
$course_id = $_GET['id'];
$skill_id = $_GET['id'];
$delete_id = $_GET['delete_id'];
$course_delete_id = $_GET['delete_id'];
$skill_delete_id = $_GET['delete_id'];
$education_update_btn = $_POST['education_update_btn'];
$course_update_btn = $_POST['course_update_btn'];
$skill_update_btn = $_POST['skill_update_btn'];



// education update and status part start
if(isset($id)){
    $check_status_query = "SELECT * FROM educations WHERE id='$id'";
    $check_status = mysqli_fetch_assoc(mysqli_query($db_connect,$check_status_query));
    if($check_status['status'] == 'deactive'){
        $update_query = "UPDATE educations SET status='active' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['status_change'] = 'status successfully change to DEACTIVE to ACTIVE';
        header("location: education_list.php");
    }else{
        $update_query = "UPDATE educations SET status='deactive' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['status_change'] = 'status successfully change to ACTIVE to DEACTIVE';
        header("location: education_list.php");
    }
}


if(isset($delete_id)){
    $delete_query = "DELETE FROM educations WHERE id='$delete_id";
    mysqli_query($db_connect,$delete_query);
    $_SESSION['delete_status'] = 'delete successfully done';
    header("location: education_list.php");
}

if(isset($education_update_btn)){
    $id = $_POST['edu_id'];
    $name = ucfirst($_POST['name']);
    $position = $_POST['position'];
    $study_from = $_POST['study_from'];
    $study_to = $_POST['study_to'];
    $location = ucfirst($_POST['location']);

    if($name){
        $update_query = "UPDATE educations SET name='$name' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['input_status'] = 'name is update';
        header("location: education_list.php");
    }else{
        $_SESSION['input_error'] = 'name is missing';
        header("location: education_list.php");
    }

    if($position){
        $update_query = "UPDATE educations SET position='$position' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['input_status'] = 'position is update';
        header("location: education_list.php");
    }else{
        $_SESSION['input_error'] = 'position is missing';
        header("location: education_list.php");
    }

    if($study_from){
        $update_query = "UPDATE educations SET study_from='$study_from' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['input_status'] = 'study from is update';
        header("location: education_list.php");
    }else{
        $_SESSION['input_error'] = 'study from is missing';
        header("location: education_list.php");
    }

    if($study_to){
        $update_query = "UPDATE educations SET study_from='$study_to' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['input_status'] = 'study to is update';
        header("location: education_list.php");
    }else{
        $_SESSION['input_error'] = 'study to is missing';
        header("location: education_list.php");
    }

    if($location){
        $update_query = "UPDATE educations SET location='$location' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['input_status'] = 'location is update';
        header("location: education_list.php");
    }else{
        $_SESSION['input_error'] = 'location is missing';
        header("location: education_list.php");
    }

}

// education update and status part end


// courses update and status part start

if(isset($course_id)){
    $check_status_query = "SELECT * FROM courses WHERE id='$course_id'";
    $check_status = mysqli_fetch_assoc(mysqli_query($db_connect,$check_status_query));
    if($check_status['status'] == 'deactive'){
        $update_query = "UPDATE courses SET status='active' WHERE id='$course_id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['status_change'] = 'status successfully change to DEACTIVE to ACTIVE';
        header("location: course_list.php");
    }else{
        $update_query = "UPDATE courses SET status='deactive' WHERE id='$course_id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['status_change'] = 'status successfully change to ACTIVE to DEACTIVE';
        header("location: course_list.php");
    }
}


if(isset($course_delete_id)){
    $delete_query = "DELETE FROM courses WHERE id='$course_delete_id";
    mysqli_query($db_connect,$delete_query);
    $_SESSION['delete_status'] = 'delete successfully done';
    header("location: course_list.php");
}

if(isset($course_update_btn)){
    $id = $_POST['course_id'];
    $name = ucfirst($_POST['course_name']);
    $position = $_POST['name_of_institute'];
    $study_from = $_POST['course_from'];
    $study_to = $_POST['course_to'];
    $location = ucfirst($_POST['location']);

    if($name){
        $update_query = "UPDATE courses SET course_name='$name' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['input_status'] = 'course name is update';
        header("location: course_list.php");
    }else{
        $_SESSION['input_error'] = 'course name is missing';
        header("location: course_list.php");
    }

    if($position){
        $update_query = "UPDATE courses SET name_of_institute='$position' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['input_status'] = 'name of institute is update';
        header("location: course_list.php");
    }else{
        $_SESSION['input_error'] = 'name of institute is missing';
        header("location: course_list.php");
    }

    if($study_from){
        $update_query = "UPDATE courses SET course_from='$study_from' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['input_status'] = 'study from is update';
        header("location: course_list.php");
    }else{
        $_SESSION['input_error'] = 'study from is missing';
        header("location: course_list.php");
    }

    if($study_to){
        $update_query = "UPDATE courses SET course_to='$study_to' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['input_status'] = 'study to is update';
        header("location: course_list.php");
    }else{
        $_SESSION['input_error'] = 'study to is missing';
        header("location: course_list.php");
    }

    if($location){
        $update_query = "UPDATE courses SET location='$location' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['input_status'] = 'location is update';
        header("location: course_list.php");
    }else{
        $_SESSION['input_error'] = 'location is missing';
        header("location: course_list.php");
    }

}

// courses update and status part end


// skill update and status part start

if(isset($skill_update_btn)){
    $id = $_POST['skill_id'];
    $title_of_skills = ucfirst($_POST['title_of_skills']);
    $percentage_of_skills = $_POST['percentage_of_skills'];

    if($title_of_skills){
        $update_query = "UPDATE skills SET title_of_skills='$title_of_skills' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['input_status'] = 'title of skill is update';
        header("location: skill_list.php");
    }else{
        $_SESSION['input_error'] = 'title of skill is missing';
        header("location: skill_list.php");
    }

    if($percentage_of_skills){
        $update_query = "UPDATE skills SET percentage_of_skills='$percentage_of_skills' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['input_status'] = 'percentage of skills is update';
        header("location: skill_list.php");
    }else{
        $_SESSION['input_error'] = 'percentage of skills is missing';
        header("location: skill_list.php");
    }

}


if(isset($skill_id)){
    $check_status_query = "SELECT * FROM skills WHERE id='$skill_id'";
    $check_status = mysqli_fetch_assoc(mysqli_query($db_connect,$check_status_query));
    if($check_status['status'] == 'deactive'){
        $update_query = "UPDATE skills SET status='active' WHERE id='$skill_id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['status_change'] = 'status successfully change to DEACTIVE to ACTIVE';
        header("location: skill_list.php");
    }else{
        $update_query = "UPDATE skills SET status='deactive' WHERE id='$skill_id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['status_change'] = 'status successfully change to ACTIVE to DEACTIVE';
        header("location: skill_list.php");
    }
}


if(isset($skill_delete_id)){
    $delete_query = "DELETE FROM skills WHERE id='$skill_delete_id";
    mysqli_query($db_connect,$delete_query);
    $_SESSION['delete_status'] = 'delete successfully done';
    header("location: skill_list.php");
}

?>