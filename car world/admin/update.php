<?php
require("connection.php");
$name=$_REQUEST["text"];
$year=$_REQUEST["date"];
$brand=$_REQUEST["radio"];
$file=$_FILES["image"]["name"];
$fuel=$_REQUEST["checkbox"];
$discription=$_REQUEST["discription"];
$id=$_REQUEST["id"];
if(empty($_FILES["image"]["name"]))
{
$res=$con->query("UPDATE tb_insert SET carname='$name',mfgyear='$year',carbrand='$brand',fuel='$fuel',discription='$discription' WHERE id='$id'");
$count=mysqli_affected_rows($con);
}
else
{
$file=$_FILES["image"]["name"];
$res=$con->query("UPDATE tb_insert SET carname='$name',mfgyear='$year',carbrand='$brand',file='$file',fuel='$fuel',discription='$discription' WHERE id='$id'");
move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$file);
}
header("location:basic_table.php");
?>