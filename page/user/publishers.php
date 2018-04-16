<?php
require "../../connectDB.php";
require "../../connect.php";
session_start();
$dbs=new DB($pdo);
$res=$dbs->allPublisherUser($_SESSION['email']);
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
			<div class="col-md-9">
  				<?php

  				foreach ($res as $key ) {
  					echo '
                      <a href="detPublisher.php?id='.$key['id_pus'].'&email='.$key['email'].'&id_stu='.$key['id_status'].'">
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