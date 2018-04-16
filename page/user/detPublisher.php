<?php
require "../../connectDB.php";
require "../../connect.php";
session_start();
$db=new DB($pdo);
$publiser=$db->publisherDeteils($_GET['id']);
$person=$db->profiledata($publiser['email']);
$status=$db->status($_GET['id_stu']);

if (isset($_POST['saves'])) {
	$status=$_POST['stutas'];
	$notes=$_POST['note'];
	echo  $db->addRevew($_GET['id'],$_SESSION['email'],$status,$notes);
}
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
									<label>Stutas </label>
									<p><?php 
                                      foreach ($status as $key) {
                                      	echo $key['status']."<br>";
                                      	echo "<h4>Note</h4><br>";
                                      	echo $key['note'];
                                      }

									?></p>
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