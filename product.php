
 <?php
 include('classes/productclass.php');
$obj=new Data;
if (isset($_POST['submit'])) {
	$productname=$_POST['productname'];
	$color=$_POST['color'];
	$size=$_POST['size'];
	$categoryname=$_POST['categoryname'];

		$discription=$_POST['discription'];
		$price=$_POST['price'];

			 $banner=$_FILES['image']['name']; 
 $expbanner=explode('.',$banner);
 $bannerexptype=$expbanner[1];

 $rand=rand(10000,99999);
  $bannername=$rand.'.'.$bannerexptype;

 $bannerpath="banners/".$bannername;
 move_uploaded_file($_FILES["image"]["tmp_name"],$bannerpath);
 	$obj->Saveproduct($productname,$color,$size,$discription,$price,$bannername,$categoryname);

}
$path=$obj->getAllproductData();
$point=$obj->getAllcategoryData();
// var_dump($path);
// die();
if (isset($_GET['delid'])) 
{
	$obj->deleteproductData($_GET['delid']);
	header( "location:product.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	

	<title>Add Product</title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body" data-url="http://neon.dev">


<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<?php include('navbar.php');?>
	
	
	<div class="main-content">					
		<h2 style="margin-left: 200px;font-size: 50px;">Add_Product</h2>
		
		<!-- <a style="margin-left: 850px;" href="logout.php">Log Out <span style="font-size: 10px;" class=" glyphicon glyphicon-log-out" ></span></a>
		<br><br> -->


		
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					
					<div class="panel-body">
						
						<form role="form" action="student.php" method="POST" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
						
						<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					
					<div class="panel-body">
						
						<form role="form" action="product.php" method="POST" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
						
							<div class="form-group">
								<label class="col-sm-3 control-label">Category</label>
								
								<div class="col-sm-5">
									<select class="form-control" name="categoryname" required>
										<option>Choose category</option>
										<?php foreach($point as $point):?>

											<option value="<?php echo $point['category_id'];?>"><?php echo $point['categoryname'];?></option>
											<?php endforeach;?>
								
										
									</select>
								</div>
							</div>
						
								<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"> Product_Name </label>
								
								<div class="col-sm-5">
									<input type="text" name="productname"class="form-control" id="field-1" placeholder="product_name--" >
								</div>
							</div>
			
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">color </label>
								
								<div class="col-sm-5">
									<input type="text" name="color"class="form-control" id="field-1" placeholder="Your Color" disabled>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Size</label>
								
								<div class="col-sm-5">
									<input type="text" name="size" class="form-control" id="field-1" placeholder="Size" disabled>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Price</label>
								
								<div class="col-sm-5">
									<input type="text" name="price" class="form-control" id="field-1" placeholder="Product Price...:)">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Discription </label>
								
								<div class="col-sm-5">
									<input type="text"  name="discription" class="form-control" id="field-1" placeholder="Product discription..." required>
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Image</label>
								
								<div class="col-sm-5">
									<input type="file" name="image" class="form-control" id="field-file" placeholder=""required>
								</div>
							</div>
							
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" name="submit" class="btn btn-success">submit</button>
								</div>
							</div>
						</form>
						<table class="table table-hover" style="margin-left: 10px; margin-top: 50px;">
					<thead>
						<tr>
							<th>#</th>
							<th>Product_Name</th>
							<th>image</th>
							<th>color</th>
							<th>Size</th>
								<th>price</th>
							<th>Discraption</th>
							<th>Category</th>
							
							<th colspan="2"> Action</th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach ($path as $path):?>
						<tr>
						<td><?php echo$path['product_id']?></td>	
				<td><?php echo$path['productname']?></td>
				<td><img src=" banners/<?php echo $path['image'];?>"width="50"></td>
				<td><?php echo $path['color'] ?></td>
				<td><?php echo $path['size'] ?></td>
				<td><?php echo $path['price'] ?></td>
				<td><?php echo $path['discription'] ?></td>
				<td><?php echo $path['categoryname'] ?></td>
							
							<td><a class="icon" id="delete" href="product.php?delid=<?php echo $path['product_id' ];?>"><i style="font-size: 20px; color: #000;" class="glyphicon glyphicon-trash" ></i></a></td>

							<td><a href=".php?editid=<?php echo $path['product_id' ];?>"><i style="font-size: 20px; color: #000;" class="glyphicon glyphicon-edit "></i></a></td>
							
						</tr>
						<?php endforeach;?>
						
						
						
					</tbody>
				</table>
						
					</div>
				
						</form>
						
					</div>
				
				</div>
			
			</div>
		</div>
		
		
		
		
	
	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/bootstrap-switch.min.js"></script>
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>