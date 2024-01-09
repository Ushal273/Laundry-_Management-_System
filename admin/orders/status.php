<?php
include('../../dbconn.php');
$id = $_GET['id'];
$status = $_GET['status'];
$updatequery = "UPDATE `order` SET`status`=$status WHERE o_id= $id ";


mysqli_query($con,$updatequery);
header('location:./index.php');
?>