<?php

include ('connect.php');

class User extends Database
{
	
	public function saveUser($username,$password){
			$obj="INSERT INTO admin(`username`,`password`) VALUES('$username','$password') ";
 		$query=$this->db->prepare($obj);
 		$query->execute();

	}

	public function getAllloginidData(){
		$login= $_SESSION['login'];
 			$obj="SELECT * FROM admin  WHERE username=$login"; 
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			// return $result;
 			var_dump($result);
 			die();

 		}

	
	public function userLogin($username,$password){
 			$obj="SELECT * FROM admin WHERE username='$username' AND password='$password'";

 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetch(PDO::FETCH_ASSOC);
 			$row = $query->rowCount();
 			
 			if($row>0)
 			{
 				session_start();
 				$_SESSION['login'] = $result['username'];
 				header("Location:index.php");
 				exit;
 			}
 			else
 			{
 				return false;
 			}
 		}

}


?>