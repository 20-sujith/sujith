<?php
require("connection.php");
$name=$_REQUEST["text"];
$year=$_REQUEST["date"];
$brand=$_REQUEST["radio"];
$file=$_FILES["image"]["name"];
$fuel=$_REQUEST["checkbox"];
$discription=$_REQUEST["discription"];
$res=$con->query("INSERT INTO `tb_insert`(`carname`,`mfgyear`,`carbrand`,`file`,`fuel`,`discription`)VALUES('$name','$year','$brand','$file','$fuel','$discription')");
$count=mysqli_affected_rows($con);
move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$file);
header("location:dashboard.php");
?>