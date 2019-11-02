<?php
include ('connect.php');


class Data extends Database 
{
		  public function savecategory($categoryname){
			$obj="INSERT INTO category (`categoryname`) VALUES('$categoryname') ";
 		$query=$this->db->prepare($obj);
 		$query->execute();

	}
	public function getAllcategoryData(){
 			$obj="SELECT *FROM category";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}
 			 public function getSinglecategoryData($id){
		$obj="SELECT * FROM category WHERE category_id=$id";
	
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}

 		 public function deletecategoryData($id)
 	{
	 	$obj="DELETE FROM category WHERE category_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }
	 public function updatecategoryData($categoryname,$id)
	 {
	 	 $obj="UPDATE category SET categoryname='$categoryname' WHERE category_id=$id";

	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }

}




?>