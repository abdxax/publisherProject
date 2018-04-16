<?php
require "../../connectDB.php";
require "../../connect.php";
session_start();
$db=new DB($pdo);
$publiser=$db->publisherDeteils($_GET['id']);
$person=$db->profiledata($publiser['email']);

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
							<form method="POST">
								<div class=" text-center">
									<label>Stutas </label>
									</div>

									<div class="col-md-4 col-md-offset-4">
								<select name="stutas" class="form-control ">
									<option>Acceptable</option>
									<option>Rejected</option>
									<option>Cancel </option>
								</select>
									</div>
								
								
								<textarea class="form-control" rows="6" name="note"></textarea>
								<input type="submit" name="saves" class="btn btn-info " value="save">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</body>
</html>