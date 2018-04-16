<?php
require "../../connectDB.php";
require "../../connect.php";
$db = new DB($pdo);

$res="";
if (isset($_POST['send'])) {
  $type=$_POST['type'];
 $nam=$_POST['serc'];
// echo $nam;
  $res=$db->searchPage($type,$nam);
  

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require "headers.php";?>
</head>
<body>
  <?php require "nav.php";?>
  <section>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-12 ">
  				<div class="text-center">
  					<h4>Search</h4>
  				</div>
  				
  				<form class="inline" method="POST">
  					<div class="col-md-2 col-md-offset-3">
  						<select class="form-control" name="type">
  							<option value="1">Nmae</option>
  							<option value="2">Title</option>
  							<option value="3">Year</option>
  						</select>
  					</div>
  					<div class="col-md-4">
  						<input type="text" name="serc" class="form-control" placeholder="Search" >
  					</div>
  					<div class="col-md-3">
  						<input type="submit" name="send" class="btn btn-info" value="Search">
  					</div>
  				</form>
  			</div>

        <div class="col-md-12">
          <?php 
         // print_r($res);
          if ($res==""){

            echo "No result";

          }
         else  {
           echo '
            <table calss="table">
                 <thead>
                   <tr>
                     <th></th>
                     <th>Title</th>
                   </tr>
                 </thead>
                 <tbody>
         ';
            foreach ($res as $key ) {
               echo '

               
                   <tr>
                    <td><a href="Publisher.php?id_pub='.$key['id_publish'].'&id_stu='.$key['id_status'].'">'.$key['title'].'</a></td>
                  </tr>
                 

            ';
            }

            echo '
              </tbody>
               </table>
            ';
 
          
           
         }
          ?>
        </div>
  		</div>
  	</div>
  </section>
</body>
</html>