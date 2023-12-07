<?php
include_once('config.php');
$status= $_GET['status'];
$studentid = $_GET['id'];
$id= $_GET['id'];
if($status=='pending'){
    $sql = $conn->query("UPDATE `student` SET status='active' WHERE studentid='$studentid' ");
    header("location:student.php");
}

if($status=='unban') {
    $sql = $conn->query("UPDATE `student` SET status='active' WHERE id ='$id'");
    header('location:user.php');
}

if($status=='ban') {
    $sql = $conn->query("UPDATE `student` SET status='banned' WHERE id ='$id'");
    header('location:user.php');
}