<?php
require("connection.php");
$id=$_REQUEST["app"];
$res=$con->query("UPDATE `tb_regfrom` SET `status`='1' WHERE id='$id'");
$count=mysqli_affected_rows($con);
header("location:dashboard.php");
?>