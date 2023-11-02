<?php
require("connection.php");
$name=$_REQUEST["username"];
$email=$_REQUEST["email"];
$pass=$_REQUEST["password"];
$cont=$_REQUEST["country"];
$stat=$_REQUEST["state"];
$id=$_REQUEST["id"];
$res=$con->query("UPDATE `tb_regfrom` SET `username`='$name',`email`='$email',`password`='$pass',`country`='$cont',`state`='$stat' WHERE id='$id'");
$count=mysqli_affected_rows($con);
header("location:dashboard.php");
?>