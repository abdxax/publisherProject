<?php
require "../../connectDB.php";
require "../../connect.php";
session_start();
if(isset($_POST['save'])){
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $db=new DB($pdo);
  $role=$db->cheack($email,$pass);
  if ($role=="user") {
     $_SESSION['email']=strip_tags($email);
     $_SESSION['password']=strip_tags($pass);
     header("location:../user/index.php");
   } 

   else if ($role=="admin") {
     $_SESSION['email']=strip_tags($email);
     $_SESSION['password']=strip_tags($pass);
     header("location:../admin/index.php");
   } 
}
$db=new DB($pdo);
$res=$db->allPublisher();

if (isset($_POST['send'])) {
  $name=$_POST['pernaem'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $pass2=$_POST['pass2'];
  $db->createAccount($email,$name,$pass,$pass2);

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
  			<div class="col-md-4">
  				<div class="panel panel-default">
  					<div class="panel-heading">
  						<div class="text-center">
  							Login
  						</div>
  					</div>
  					<div class="panel-body">
  						<form class="form-horizontal" method="POST">
  							<div class="form-group ">
  								<div class="col-md-9 col-md-offset-1">
  									<input type="email" name="email" class="form-control" placeholder="Email">
  								</div>
  							</div>

  							<div class="form-group ">
  								<div class="col-md-9 col-md-offset-1">
  									<input type="password" name="pass" class="form-control" placeholder="Password">
  								</div>
  							</div>

  							<div class="form-group ">
  								<div class="text-center">
  									<input type="submit" name="save" class="btn btn-info" value="Login">
  								</div>
  							</div>

  							<div class="form-group ">
  								<div class="text-center">
  									<a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"> Create new account </a>
  								</div>
  							</div>

  						</form>
  					</div>
  				</div>
  			</div>
        <!-- pop-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Create New Account</h4>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="pernaem">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Email:</label>
           <input type="email" class="form-control" id="recipient-name" name="email">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Password:</label>
           <input type="password" class="form-control" id="recipient-name" name="pass">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Repate Password:</label>
           <input type="password" class="form-control" id="recipient-name" name="pass2">
          </div>
        
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-info" name="send" value="Create">
        
        </form>
      </div>
    </div>
  </div>
</div>
  			<!-- Anther side -->
  			<div class="col-md-8">
  				<?php

            foreach ($res as $key) {
              echo '
                    <a href="Publisher.php?id_pub='.$key['id_pus'].'&email='.$key['email'].'&id_stu='.$key['id_status'].'">
                 <div class="panel panel-default">
            <div class="panel-heading">
              <div class="text-center">
                '.$key['title'].'
              </div>
            </div>
            <div class="panel-body">
              '.$key['abstract'].'
            </div>
          </div>
          </a>

              ';
            }

          ?>
  			</div>
  		</div>
  	</div>
  </section>
  
</body>
</html>