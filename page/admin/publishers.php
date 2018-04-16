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
 	<div class="col-md-8 col-md-offset-2" >
 		<?php 
          $row=$dbs->publisherForAdmin();
          foreach ($row as $r) {
          	echo '
              <a href="detPublisher.php?id='.$r['id_publish'].'">
               <div class="panel panel-default">
                 <div class="panel-heading text-center">
                  '.$r['title'].'
                 </div>
                 <div class="panel-body text-center">
                  '.$r['abstract'].'
                 </div>
               </div>
              </a>
          	';
          }
 		?>
 	</div>
 </section>
</body>
</html>