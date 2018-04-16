<?php 
require "../../connectDB.php";
require "../../connect.php";
session_start();
$emls= $_SESSION['email'];
$db=new DB($pdo);
if (isset($_POST['save'])) {
  $title=$_POST['title'];
  $abstra=$_POST['abstract'];
  echo $db->addPublisher($emls,$title,$abstra);
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
        <div class="col-md-12 text-center">
           <h2 class="text-center">Add New Publisher </h2>
        </div>
  			<div class="col-md-9 col-md-offset-4">
         
       <form class="form-horizontal" method="POST">
         <div class="form-group">
           <label>:Title</label>
           <div class="col-md-6">
             <input type="text" name="title" class="form-control" >
           </div>
         </div>

         <div class="form-group">
           <label>:Abstract</label>
           <div class="col-md-6">
             <textarea class="form-control" name="abstract" rows="5"></textarea>
           </div>
         </div>

         <div class="form-group">
           <label></label>
           <div class="col-md-6">
             <input type="submit" name="save" class="btn btn-success btn-block" value="Save" >
           </div>
         </div>
       </form>   
        </div>
  		</div>
  	</div>
  </section>
  
</body>
</html>