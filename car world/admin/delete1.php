<?php
require("connection.php");
$id=$_REQUEST["del"];
$res=$con->query("SELECT*FROM `tb_regfrom` WHERE id='$id'");
$count=$res->num_rows;
if($count>0)
$row=$res->fetch_assoc();
$res=$con->query("DELETE FROM `tb_regfrom` WHERE id='$id'");
$count=mysqli_affected_rows($con);
if($count>0)
{
header("location:dashboard.php");
}
else
{
header("location:responsive_table.php");
}
?>