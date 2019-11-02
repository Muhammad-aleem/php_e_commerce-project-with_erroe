<?php
include('cartclass.php');

 
 class Data extends CartData
 {
 	public function Saveproduct($productname,$color,$size,$discription,$price,$image,$category){
 	$obj="INSERT INTO product(`productname`,`color`,`size`,`discription`,`price`,`image`,`category`) VALUES ('$productname','$color','$size','$discription','$price','$image','$category')";

 	
 			$query=$this->db->prepare($obj);
 		$query->execute();

 	}
 	public function getAllproductidData(){
 			$obj="SELECT product.product_id FROM product INNER JOIN cart ON product.product_id=cart.product_id";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}
 		public function getAllcategoryData(){
 			$obj="SELECT *FROM category";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}
 		 public function getSingleproductData($id){
		$obj="SELECT * FROM product WHERE product_id=$id";
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
 		 public function deleteproductData($id)
 	{
	 	$obj="DELETE FROM product WHERE product_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }
	
 }
?>