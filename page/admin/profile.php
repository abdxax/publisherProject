<?php
require "../../connectDB.php";
require "../../connect.php";
session_start();
$dbs=new DB($pdo);
$res=$dbs->profiledata($_SESSION['email']);

// upload image 
if (isset($_FILES['imag'])) {
  print_r($_FILES['imag']);
  $name_image=$_FILES['imag']['name'];
  $type_image=$_FILES['imag']['type'];
  $tem_image=$_FILES['imag']['tmp_name'];
  $size_image=$_FILES['imag']['size'];
  $name=$_POST['names'];
  $mejar=$_POST['majers'];
  $degree=$_POST['Degrees'];
  $job=$_POST['jobs'];
  $exp=explode('.', $name_image);
  $file_exp=end($exp);
  $file_exc=strtolower($file_exp);
  $arrexp=array("jpeg","jpg","png");
  if (in_array($file_exc, $arrexp)) {
   if ($size_image<=3097152) {
    $newNmae=$_SESSION['email']."_".$name_image;
    $des="../../images/".$newNmae;
      if (move_uploaded_file($tem_image, $des)) {
         $msg=$res=$dbs->editProfile($des,$name,$mejar,$degree,$job,$_SESSION['email']);
          if ($msg =="DONE publisher"){
          header("location:profile.php?mes=Done");
        }
      }
      else{
        echo "des";
      }
     
   }
   else {
    echo "size";
   }
  }
  else{
    echo "Type";
  }
 
  //move_uploaded_file($tem_image, "user".$name_image);
}
if (isset($_POST['saves'])) {
  $name=$_POST['names'];
  $mejar=$_POST['majers'];
  $degree=$_POST['Degrees'];
  $job=$_POST['jobs'];
   $msg=$res=$dbs->editProfile("",$name,$mejar,$degree,$job,$_SESSION['email']);
        if ($msg =="DONE publisher"){
          header("location:profile.php?mes=Done");
        }

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
        <?php 
          if (isset($_GET['msg'])) {
            echo'
<div class="alert alert-success text-center">'.$_GET['msg'].'</div>
            ';
          }
        ?>
        <div class="col-md-10">
       <div class="panel panel-default">
         <div class="panel-body">
           <div class="col-md-6">
             <img src=<?php echo $res['paths'];?> width="90px" height="90px">
           </div>
           
           <div class="col-md-4">
             <h5>Name: <?php echo $res['name']?> </h5>
           </div>
           <div class="col-md-4">
             <h5>Majer: <?php echo $res['majer']?> </h5>
           </div>
           <div class="col-md-4">
             <h5>Degree: <?php echo $res['Degree']?> </h5>
           </div>
           
           


         </div>
       </div>
      </div>

  			<div class="col-md-8">
       <form method="POST" enctype="multipart/form-data" class="form-horizontal">
          <div class="form-group">
            <label class="col-md-2 ">Name</label>
            <div class="col-md-5">
              <input type="text" name="names" class="form-control" value=<?php echo $res['name'];?>>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 ">Majer</label>
            <div class="col-md-5">
              <input type="text" name="majers" class="form-control" value=<?php echo $res['majer'];?>>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 ">Degree</label>
            <div class="col-md-5">
              <input type="text" name="Degrees" class="form-control" value=<?php echo $res['Degree'];?>>
            </div>
          </div>

           <div class="form-group">
            <label class="col-md-2 ">Job</label>
            <div class="col-md-5">
              <input type="text" name="jobs" class="form-control" value=<?php echo $res['job'];?>>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 ">Image</label>
            <div class="col-md-5">
              <input type="file" name="imag" class="form-control" >
            </div>
          </div>

           <div class="form-group">
            <label class="col-md-2 "></label>
            <div class="col-md-5">
              <input type="submit" name="saves" class="btn btn-success btn-block" value="Save">
            </div>
          </div>



        </form>   
        </div>
        
  		</div>
  	</div>
  </section>
  
</body>
</html>