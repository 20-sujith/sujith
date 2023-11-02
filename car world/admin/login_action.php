<?php
require("connection.php");
session_start();
$mail=$_REQUEST["Email"];
$pass=$_REQUEST["Password"];
$res=$con->query("SELECT * FROM `tb_login` WHERE `email`='$mail' AND `password`='$pass'");
$count=$res->num_rows;

if($count>0)
{
	$_SESSION["aaaa"]=$mail;
header("location:dashboard.php");
}
else
{
echo
"<script>
alert('Invalid password');
document.location.href='index.php';
</script>";
}
?>