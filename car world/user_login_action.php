<?php
require("connection.php");
$email=$_REQUEST["Email"];
$pass=$_REQUEST["Password"];
$res=$con->query("SELECT * FROM `tb_regfrom` WHERE `email`='$email' AND `password`='$pass'");
$count=$res->num_rows;
if($count>0)
{
header("location:index.php");
}
else
{
"<script>
alert('Invalid password');
document.location.href='login.php';
</script>";
}
?>