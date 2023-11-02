<?php
require("connection.php");
$name=$_REQUEST["username"];
$email=$_REQUEST["email"];
$pass=$_REQUEST["password"];
$cont=$_REQUEST["country"];
$stat=$_REQUEST["state"];
$res=$con->query("INSERT INTO `tb_regfrom`(`name`,`email`,`password`,`country`,`state`)VALUES('$name','$email','$pass','$cont','$stat')");
$count=mysqli_affected_rows($con);
header("location:index.php");
?>