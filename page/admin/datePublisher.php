<?php
require "../../connectDB.php";
require "../../connect.php";
session_start();
$dbs=new DB($pdo);
$res=$dbs->profiledata($_SESSION['email']);

if (isset($_GET['save'])) {
	$day=$_GET['day'];
	$month=$_GET['month'];
	$year=$_GET['year'];
	 echo $dbs->addDate($day,$month,$year);
}
$pubs=$dbs->displayPublisherDay();

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
       	<div class="col-md-12">
       		<div class="text-center">
       			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add Date Publisher </button>


       		</div>
       	</div>

       	<div class="col-md-12 ">
       		<h3 class="text-center">Publisher</h3>
       		<div class="col-md-10">
       			<table class="table">
       				<thead>
       					<tr>
       					<th>Title</th>
       					<th>Day</th>
       					<th></th>
       				</tr>
       				</thead>
       				<tbody>
       					 <?php 
                          
                         foreach ($pubs as $row) {

                            echo '
                            
                           <tr>
                           <td><a href="datePublisherSelect.php?id_pub='.$row['id_publish'].'& id_stu='.$row['id_status'].'">'.$row['title'].'</a></td>
                            
                             </tr>
                             ';
                      }
                             
       					?>
       				</tbody>
       			</table>
       		</div>
       	</div>
       </div>
 	 </div>

 	 <!-- pop -->
 	 <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Date Publisher</h4>
      </div>

      <div class="modal-body">
        
       <form class="dateform" > 
       	<input type="number" name="day" placeholder="Day" class="form-control">
       	<input type="number" name="month" placeholder="month" class="form-control">
       	<input type="number" name="year" placeholder="year" class="form-control">

       	<input type="submit" name="save" value="Save" class="btn btn-info " style="margin-top: 10px">
        
               </form>
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