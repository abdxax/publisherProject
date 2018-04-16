<?php
require "../../connectDB.php";
require "../../connect.php";
session_start();
$dbs=new DB($pdo);
$res=$dbs->profiledata($_SESSION['email']);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require "headers.php" ?>
</head>
<body>
  <?php require "nav.php";?>
  <section>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-10 col-md-offset-1">
          <div class="col-md-12 text-center">
            <img src=<?php echo $res['paths'];?> width="300px" height="300px">

          </div>
          <div class="text-center">
            <h4><?php echo $res['name'];?></h4>
            <h4><?php echo $res['majer'];?></h4>
            <h4><?php echo $res['Degree'];?></h4>
            <h4><?php echo $res['job'];?></h4>
          </div>
        </div>
  		</div>
  	</div>
  </section>
  
</body>
</html>