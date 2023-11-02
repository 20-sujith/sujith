<html>
<title>Car Details</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">   
<script src="js/jquery-2.2.3.min.js"></script>
<head>
<style>
body{
	background-image:url("car/carwall.png");
}
.a{
	width:100%;
	height:100px;
	
}
	
</style>
</head>
<body>
<div class="container-fluid a">
 </div>
 <div class="container-fluid b">
 <div class="row">
            <div class="col-md-4">
			</div>
            <div class="col-md-4">
			<?php
require("connection.php");
$res=$con->query("SELECT*FROM tb_insert");
$count=$res->num_rows;
?>
                    <section class="panel">
                        <header class="panel-heading">
                            <center>CAR DETAILS</center>
                        </header>
						<?php
require("connection.php");
$id=$_REQUEST["car"];
$res=$con->query("SELECT*FROM tb_insert WHERE id=$id");
$count=$res->num_rows;
if($count>0)
{
$row=$res->fetch_assoc();
}
?>
                    
                                <form role="form" action="#" method="post" enctype="multipart/form-data" class="form">
								<input type="hidden" value="<?php echo $row["id"];?>" name="id">
								<center>
								<div class="image">
								<img src="<?php echo "admin/images/" . $row["file"];?>" alt=""/>
								</div>
								</center>
								<div>
								<p><b>Model Name:</b><?php echo $row["carname"];?></p>
								<p><b>Mfg Year:</b><?php echo $row["mfgyear"];?></p>
								<p><b>Brand:</b><?php echo $row["carbrand"];?></p>
								<p><b>Fuel:</b><?php echo $row["fuel"];?></p>
								<p><b>Details:</b><?php echo $row["discription"];?></p>
								</div>
								<center>
								<div class="form-group">
                                <button type="submit" class="btn btn-success">Buy Now</button>	
								</center>
                            </form>
                            </div>

                                </div>
                                </div>
                                </div>
                                </div>
								
								<div class="col-md-4">
 </div>
</body>
</html>