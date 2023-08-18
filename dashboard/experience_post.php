<?php
session_start();
include('../config/configdb.php');


$skills_btn = $_POST['skills_btn'];
$education_btn = $_POST['education_btn'];
$course_btn = $_POST['course_btn'];

if(isset($skills_btn)){
    $title_of_skills = ucfirst($_POST['title_of_skills']);
    $percentage_of_skills = $_POST['percentage_of_skills'];

    if($title_of_skills && $percentage_of_skills){
        $insert_query = "INSERT INTO skills (title_of_skills,percentage_of_skills) VALUES ('$title_of_skills','$percentage_of_skills')";
        mysqli_query($db_connect,$insert_query);
        $_SESSION['skills_success'] = "skills inserted successful";
        header("location: experience.php");

    }else{
        $_SESSION['skills_error'] = "sorry! input fields can't be NULL";
        header("location: experience.php");
    }
}


if(isset($education_btn)){
    $name = ucfirst($_POST['name']);
    $position = $_POST['position'];
    $study_from = $_POST['study_from'];
    $study_to = $_POST['study_to'];
    $location = ucfirst($_POST['location']);

    if($name && $position && $study_from && $study_to && $location){
        $insert_query = "INSERT INTO educations (name,position,study_from,study_to,location) VALUES ('$name','$position','$study_from','$study_to','$location')";
        mysqli_query($db_connect,$insert_query);
        $_SESSION['edu_success'] = "skills inserted successful";
        header("location: experience.php");

    }else{
        $_SESSION['edu_error'] = "sorry! input fields can't be NULL";
        header("location: experience.php");
    }
}


if(isset($course_btn)){
    $course_name = ucfirst($_POST['course_name']);
    $name_of_institute = ucfirst($_POST['name_of_institute']);
    $course_from = $_POST['course_from'];
    $course_to = $_POST['course_to'];
    $location = ucfirst($_POST['location']);

    if($course_name && $name_of_institute && $course_from && $course_to && $location){
        $insert_query = "INSERT INTO courses (course_name,name_of_institute,course_from,course_to,location) VALUES ('$course_name','$name_of_institute','$course_from','$course_to','$location')";
        mysqli_query($db_connect,$insert_query);
        $_SESSION['course_success'] = "skills inserted successful";
        header("location: experience.php");

    }else{
        $_SESSION['course_error'] = "sorry! input fields can't be NULL";
        header("location: experience.php");
    }
}


?>