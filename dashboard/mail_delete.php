<?php
include("../config/configdb.php");
session_start();

$delete_id = $_GET['delete_mail_id'];


if(isset($delete_id)){
    $delete_query = "DELETE FROM mails WHERE id='$delete_id'";
    mysqli_query($db_connect,$delete_query);
    $_SESSION['delete_status'] = 'delete successfully done';
    header("location: show_mails.php");
}

?>