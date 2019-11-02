<?php
include ('connect.php');
 class Checkclass extends Database
 {
 	public function Savecheck($total_amount,$date,$name,$address,$country,$zip_code,$phone,$ip_address){
 $sql="INSERT INTO orders(`total_amount`,`date`,`name`,`address`,`country`,`zip_code`,`phone`,`ip_address`) VALUES('$total_amount','$date','$name','$address','$country','$zip_code','$phone','$ip_address') ";
 		$query=$this->db->prepare($sql);
 		$query->execute();

		$lastid=$this->db->lastInsertId();
		
	 	 $obj="SELECT cart.product_id,cart.quantity,cart.price,cart.total_price,cart.ip_address,product.productname,product.color,product.size,product.discription,product.price,product.image FROM cart INNER JOIN product ON cart.product_id=product.product_id";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			// var_dump($result);
 			// die();
 			foreach ($result as  $value) {
 				$product = $value['product_id'];
 				$order=$lastid;
 				$price=$value['price'];
 				$quantity=$value['quantity'];
 				 $obj="INSERT INTO order_product(`order_id`,`product_id`,`price`,`quantity`) values('$order','$product','$price','$quantity')";
 				
 					$query=$this->db->prepare($obj);
 					$query->execute();


 			}
 		
 	}
 		public function getAllcartData(){
 			$obj="SELECT cart.quantity,cart.price,cart.total_price,cart.ip_address,product.productname,product.color,product.size,product.discription,product.price,product.image FROM cart INNER JOIN product ON cart.product_id=product.product_id";
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
 		public function countProductData($ip){
	 $obj=" SELECT * FROM cart WHERE ip_address='$ip'";
		$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 			
 		}
 			public function getAllorderData(){
 			$obj="SELECT 
		product.productname,product.price,product.image,orders.order_id,orders.total_amount,orders.date,orders.name,orders.address,orders.country,orders.zip_code,orders.phone,order_product.product_id,order_product.price,order_product.quantity FROM orders INNER JOIN order_product  ON orders.order_id=order_product.order_id INNER join product on product.product_id=order_product.product_id";
 			$query=$this->db->prepare($obj);
 			$query->execute();
 			$result=$query->fetchALL(PDO::FETCH_ASSOC);
 			return $result;
 		}
 			 public function deleteorderData($id)
 	{
	 	$obj="DELETE FROM orders WHERE order_id=$id";
	 	$query=$this->db->prepare($obj);
		$query->execute();

	 }
	 public function getSingleorderData($id){
		$obj="SELECT * FROM orders  WHERE  order_id=$id";
	
	 $query=$this->db->prepare($obj);
	 $query->execute();
	 $result=$query->fetch(PDO::FETCH_ASSOC);
	 return $result;
	}

	
 	
 } 


?>