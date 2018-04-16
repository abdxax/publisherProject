<?php
require "../../connectDB.php";
require "../../connect.php";
session_start();
$db=new DB($pdo);
$publiser=$db->publisherDeteils($_GET['id_pub']);
$person=$db->profiledata($publiser['email']);
$dates=$db->datePubli($_GET['id_stu']);

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
			<div class="col-md-10">
				<div class="col-md-12">
					<div class="col-md-4">
						<img src=<?php echo $person['paths'];?> width="150px" height="150px">
					</div>
					<div class="col-md-4">
						<h5><?php echo $person['name']; ?></h5>
						<p><?php echo $person['Degree'] ?></p>
					</div>
					
				</div>

				<div class="col-md-12" >
					<div class="panel panel-default">
						<div class="panel-heading text-center">
							<h4><?php echo $publiser['title'];?></h4>
						</div>

						<div class="panel-body">
							<p><?php echo $publiser['abstract']; ?></p>
						</div>

						<div class="panel-footer">
							
								<div class=" text-center">
									<label>Day for publisher </label>
									 <p><?php 
                                           foreach ($dates as $key) {
                                           echo $key['Day']."-".$key['Month']."-".$key['Year'];
                                           }

                                         ?>
								       </p>
									</div>

									
								
								
								
								
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</body>
</html>