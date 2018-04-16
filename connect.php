<?php 

 /**
* 
*/
class DB 
{
	private $connect;
	function __construct(PDO $pdo)
	{
		$this->connect=$pdo;
	}

	

	// cheack for role 
	public function cheack($email,$pass){
		$eml=strip_tags($email);
		$pas=md5(strip_tags($pass));
		$sql=$this->connect->prepare ("SELECT * FROM user WHERE email=? AND password=?");
		if($sql->execute(array($eml,$pas))){
			if($sql->rowCount()==1){
			foreach ($sql as $row) {
				return $row['role'];
			}
		}
		else{
			return "null colm";
		}
		}
		else{
			return "string";
		}
		
		

	}

	//ADD Publisher 

	public function addPublisher($email,$title,$abstract){
		$eml=strip_tags($email);
		$tli=strip_tags($title);
		$abs=strip_tags($abstract);
		$sql=$this->connect->prepare ("INSERT INTO publishers (email,title,abstract)VALUES(?,?,?)");
		if ($sql->execute(array($eml,$tli,$abs))) {
			return "DONE publisher";
		}
		else{
			return "NOT UP";
		}
	}

	//displaydata 
	public function profiledata($email){
		$eml=strip_tags($email);
		$sql=$this->connect->prepare ("SELECT * FROM details WHERE email=?");
		if ($sql->execute(array($eml))) {
			foreach ($sql as $row) {
				return $row;
			}
		}
		else{
			echo "error";
		}
	}

	public function editProfile($files,$name,$mejar,$degree,$job,$email){
		$name=strip_tags($name);
		$mejar=strip_tags($mejar);
		$degree=strip_tags($degree);
		$path=strip_tags($files);
		$eml=strip_tags($email);
		if ($files !=""){
			$sql=$this->connect->prepare ("UPDATE details SET name=?,Degree=?,majer=?,job=?,paths=? WHERE email=?");
		if ($sql->execute(array($name,$degree,$mejar,$job,$path,$eml))) {
			return "DONE publisher";
		}
		else{
			return "NOT UP";
		}
		}
		else{
			$sql=$this->connect->prepare ("UPDATE details SET name=?,Degree=?,majer=?,job=? WHERE email=?");
		if ($sql->execute(array($name,$degree,$mejar,$job,$eml))) {
			return "DONE publisher";
		}
		else{
			return "NOT UP";
		}
		}
      
	}

	//All new publisher for admin 
	public function publisherForAdmin(){
		$sql=$this->connect->prepare ("SELECT * FROM publishers where viewed=?");
		if($sql->execute(array(""))){
			return $sql;
		}
		else{
			return "nothing ";
		}
	}

	//Deteils for publisher 
	public function publisherDeteils($id){
		$sql=$this->connect->prepare ("SELECT * FROM publishers WHERE id_publish =? ");
		if($sql->execute(array($id))){
			foreach ($sql as $row) {
				return $row;
			}
		}
	}

	//Add revew for publisher 
	public function addRevew ($id_pub,$admin_email,$status,$note){
		$id_pubs=strip_tags($id_pub);
		$id_admi=strip_tags($admin_email);
		$statu=strip_tags($status);
		$notes=strip_tags($note);
		$sql=$this->connect->prepare ("INSERT INTO status (admin_email,id_pus,note,status)VALUES(?,?,?,?)");
		if ($sql->execute(array($id_admi,$id_pubs,$notes,$statu))) {
			$sql_upd=$this->connect->prepare("UPDATE publishers SET viewed=? WHERE id_publish=?");
			if ($sql_upd->execute(array("Done",$id_pubs))) {
				return "review done";
			}
		}
		else{
			return "NOT UP";
		}

	}

	//ADD Date publisher 
public function addDate ($day,$month,$year){
		$days=strip_tags($day);
		$mont=strip_tags($month);
		$Year=strip_tags($year);
		
		$sql=$this->connect->prepare ("INSERT INTO datepublisher (Day,Month,Year)VALUES(?,?,?)");
		if ($sql->execute(array($days,$mont,$Year))) {
			return "DONE Date";
		}
		else{
			return "NOT UP";
		}

	}

	//Display publisher is accept and null date 
	public function displayPublisherDay(){
	 $sql=$this->connect->prepare ("SELECT * FROM status LEFT JOIN publishers ON  status.id_pus= publishers.id_publish WHERE status.status=? AND status.daypublsher=?");
		if ($sql->execute(array("Acceptable",""))) {
			return $sql;
		}
		else{
			return "NOT UP";
		}

	}
//desplay all day 
	public function Date(){
		
		$sql=$this->connect->prepare ("SELECT * FROM datepublisher ");
		if ($sql->execute()) {
			
				return $sql;
			
		}
		else{
			echo "error";
		}
	}

	//Add day publisher 
	public function addDayPublisher($id_stat,$id_date,$id_publis){
		$sql=$this->connect->prepare("INSERT INTO accept (id_statu,id_date) VALUES(?,?)");
		if ($sql->execute(array($id_stat,$id_date))){
			$sql_upda=$this->connect->prepare ("UPDATE status SET daypublsher=? WHERE id_pus=?");
			if($sql_upda->execute(array("Done",$id_publis))){
				return "daone";
			}
			else{
				require 'file';
			}
		}

	}

	public function searchPage($id_item,$item){
		$name=strip_tags($item);
		switch ($id_item) {
			case 1:
				$emil=$this->searchName($name);
				$resy=$this->displaySearch($emil);
				return $resy;
                  break;
				case 2:
					$emil=$this->searchTitle($name);
				$resy=$this->displaySearch($emil);
					return $resy;
			
			case 3:
				$years=$this->dateYear($item);
				$res=$this->displayPubliserForYear($item);
				return $res;
				break;
			
		}
	}

	public function searchName($name){
		$sql=$this->connect->prepare("SELECT * FROM details WHERE name=?");
		if($sql->execute(array($name))){
			foreach ($sql as $key ) {
				return $key['email'];
			}
		}
		else{
			return "Not up";
		}
	}

	public function searchTitle($title){
		$sql=$this->connect->prepare("SELECT * FROM publishers WHERE title=?");
		if($sql->execute(array($title))){
			foreach ($sql as $key ) {
				return $key['email'];
			}
		}
		else{
			return "Not up";
		}
	}

	public function displaySearch ($email){
		$sql=$this->connect->prepare ("SELECT * FROM status RIGHT JOIN publishers ON  status.id_pus= publishers.id_publish WHERE publishers.email=? AND status.status=? AND status.daypublsher=?");
		if ($sql->execute(array($email,"Acceptable","Done"))) {
			return $sql;
		}
	}


public function datePubli($id_stu){
	$sql=$this->connect->prepare("SELECT * FROM datepublisher LEFT JOIN accept ON datepublisher.id_date=accept.id_date WHERE accept.id_statu=?");
	if ($sql->execute(array($id_stu))){
		return $sql;
	}
}

public function dateYear($Year){
	$sql=$this->connect->prepare("SELECT * FROM datepublisher Right JOIN accept ON datepublisher.id_date=accept.id_date WHERE datepublisher.Year=?");
	if ($sql->execute(array($Year))){
		foreach ($sql as $key ) {
			return $key['id_date'];
		}
	}
}


public function Year($year){
	$sql=$this->connect->prepare("SELECT * FROM datepublisher WHERE Year=?");
}

public function displayPubliserForYear($id_sta){
	$sql=$this->connect->prepare ("SELECT *
  FROM publishers I
  JOIN status s ON s.id_pus = I.id_publish 
  JOIN accept P ON P.id_statu = s.id_status
  JOIN datepublisher d ON d.id_date=p.id_date
  WHERE d.id_date=?
  ");
		if ($sql->execute(array($id_sta))) {
			return $sql;
		}
}


public function allPublisher (){
	$sql=$this->connect->prepare ("SELECT * FROM status RIGHT JOIN publishers ON  status.id_pus= publishers.id_publish WHERE   status.status=? AND status.daypublsher=?");
		if ($sql->execute(array("Acceptable","Done"))) {
			return $sql;
		}
}

public function allPublisherUser ($email){
	$sql=$this->connect->prepare ("SELECT * FROM status RIGHT JOIN publishers ON  status.id_pus= publishers.id_publish WHERE publishers.email=? ");
		if ($sql->execute(array($email))) {
			return $sql;
		}
}

public function status($id){
$sql=$this->connect->prepare ("SELECT * FROM status where id_status=? ");
		if ($sql->execute(array($id))) {
			return $sql;
		}
}

public function createAccount($email,$name,$pass1,$pass2){
	$email=strip_tags($email);
	$name=strip_tags($name);
	$pass=strip_tags($pass1);
	$pass2=strip_tags($pass2);
	if($pass==$pass2){
		$pass=md5($pass);
		$sql=$this->connect->prepare("INSERT INTO user (email,password,role) VALUES(?,?,?)");
		if ($sql->execute(array($email,$pass,"user"))){
			$sql_detl=$this->connect->prepare("INSERT INTO details (name,paths,email) VALUES(?,?,?)");
			if ($sql_detl->execute(array($name,"../../images/man.png",$email))) {
				return "done";
			}
	}
	

}
}
}

