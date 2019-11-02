<?php
include ('connect.php');
class CartData extends  Database
{
	public function SavecartData($product_id,$quantity,$ip_address){
		$obj="SELECT * FROM product WHERE product_id=$product_id";
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 $price = $result['price'];
	 $total_price=$quantity*$price;


	 $obj=" INSERT INTO cart(`product_id`,`quantity`,`price`,`total_price`,`ip_address`)VALUES ('$product_id','$quantity','$price','$total_price','$ip_address') "; 
		
			$query=$this->db->prepare($obj);
 		$query->execute();
	}

    	public function getAllcartData(){
 			$obj="SELECT cart.quantity,cart.price,cart.total_price,cart.ip_address,product.productname,product.color,product.size,product.discription,product.price,product.image FROM cart INNER JOIN product ON cart.product_id=product.product_id";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}

		public function getAllproductData(){
 			$obj="SELECT  product_id,category.categoryname,product.productname,product.color,product.size,product.discription,product.price,image FROM category INNER JOIN product ON category.category_id=product.category";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}
	 	 public function getSingleproductData($product_id){
		$obj="SELECT * FROM product WHERE product_id=$product_id";
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}
		
	public function countProductData($ip){
	 $obj=" SELECT * FROM cart WHERE ip_address='$ip'";
		$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 			
 		}
 		public function sumtotal($ip){
 			 $sql="SELECT SUM(total_price) AS t_price FROM cart WHERE ip_address='$ip'";
 			
 			
 			$query=$this->db->prepare($sql);
 			$query->execute();
 			$result=$query->fetch(PDO::FETCH_ASSOC);
 			return $price=$result['t_price'];
 		}
	
}
?>