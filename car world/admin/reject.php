<?php
require("connection.php");
$id=$_REQUEST["rej"];
$res=$con->query("UPDATE `tb_regfrom` SET `status`='2' WHERE id='$id'");
$count=mysqli_affected_rows($con);
header("location:dashboard.php");
?>