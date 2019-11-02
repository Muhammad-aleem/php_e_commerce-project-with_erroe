<?php
?>
<?php

include('classes/productclass.php');
$obj=new Data;

session_start();
if(!isset($_SESSION['login']))
{
	header("Location:login.php");
}




$path=$obj->getAllproductData();
$point=$obj->getAllcategoryData();
// var_dump($path);
// die();
// 
 $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
$shop=$obj->getAllcartData();
$cartproduct=$obj->countProductData($ipaddress);
$cartproduct = count($cartproduct);
// 


?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>User</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.html" class="site-logo">
							<img src="img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Search on divisima ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<a href=""><?php
								if ($_SESSION['login']) {
									echo $_SESSION['login'];	
								}else{
									echo "Create Account";
								}
								?></a>
								
								<!-- <a style="margin-left: 850px;" href="logout.php">Log Out <span style="font-size: 10px;" class=" glyphicon glyphicon-log-out" ></span></a> -->
							</div>
							<!-- <?php echo $_SESSION['login'] ?> -->
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span><?php echo $cartproduct;?></span>
								</div>
								<a href="http://localhost/shopping%20stor/cart.php">Shopping Cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</header>

			<!-- 	<div class="container">
					
				
			
			
		<center><h2><b> User Details </b></h2></center>
	

		<hr>
		
						

					

		<div class="row">
			
			<div class="col-md-12">
				
				
				
				<table class="table responsive" >
					
					
					<thead>
						<tr>
							<b>
							<th><b>Product_Name</b></th>
							<th>Price</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Address</th>
							
							</b>
						</tr>
					</thead>

					<tbody>
					

					<tr>
						
							
					</tr>
					
						
						
					</tbody>
				</table>
				
		
			</div> -->
	<center>
	<section class="cart-section spad" style="margin-left:300px;  ">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>User Orders</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Product</th>
									<th class="quy-th">Quantity</th>
									<th class="total-th">Price</th>
									<th class="total-th">Total_Price</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($shop as $shop):?>
								<tr>
									<td class="product-col">
										<!-- <img src="img/cart/1.jpg" alt=""> -->
										<img style="width: 100px;height: 100px;" class="product-big-img" src="banners/<?php echo $shop['image'];?>" >
										<div class="pc-title">
											<p>$<?php echo $shop['productname'];?></p>
											 <p>$<?php echo $shop['price'];?></p>
										</div>
									</td>
									<td class="quy-col">
										<div class="quantity">
					                   
											<?php echo $shop['quantity'];?>

											
                    					</div>
									</td>
									<td class="size-col"><h4> $<?php echo $shop['price'];?></h4></td>
									<td class="total-col"><h4>$<?php echo $shop['total_price'];?></h4></td>
							
						
								<?php endforeach;?>
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<!-- <h6>Total <span><?php  $t_price;?></span></h6> -->
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	</center>




<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

		
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>





