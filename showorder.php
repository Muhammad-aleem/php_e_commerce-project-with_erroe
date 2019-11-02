<?php
include('classes/checkclass.php');
$obj=new  Checkclass;

$show=$obj->getAllorderData();
// var_dump($show);
// die();
if (isset($_GET['delid'])) 
{
	$obj->deleteorderData($_GET['delid']);
	header( "location:showorder.php");
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

	

	<title>Show Orders</title>

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


				<div class="container">
					
				
			
			
		<center><h2><b>Show Order</b></h2></center>
	
		<hr>
		<hr>
		<div class="row">
			
			<div class="col-md-8">
				
				
				
				<table class="table responsive" >
					
					<thead>
						<tr>
							<b>
							<th>#</th>
							<th><b>Name</b></th>
							<th>Address</th>
							<th>country</th>
							<th>Zip_code</th>
							<th>Phone</th>
							<th colspan="3">Action</th>
							</b>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach ($show as $shows):?>
					<tr>
						<td><?php echo $shows['order_id'];?></td>
						<td><?php echo $shows['name'];?></td>
							<td><?php echo $shows['address'];?></td>
						<td><?php echo $shows['country'];?></td>
						<td><?php echo $shows['zip_code'];?></td>
						<td><?php echo $shows['phone'];?></td>
							<td><a class="btn btn-danger" class="icon" id="delete" href="showorder.php?delid=<?php echo $shows['order_id' ];?>"><i style="font-size: 20px; color: white;" class="glyphicon glyphicon-trash" ></i></a></td>
						<td><a class="btn btn-success" href=".php?editid=<?php echo ['category_id' ];?>"><i style="font-size: 20px; color: white;" class="glyphicon glyphicon-edit  "></i></a></td> 
								<td><a class="btn btn-warning" href="singaldata.php?editid=<?php echo $shows['order_id' ];?>"><i style="font-size: 20px; color: white;" class="glyphicon  glyphicon-ok-circle  "></i></a></td> 
						
							
						
					</tr>
					<?php endforeach;?>
						
						
					</tbody>
				</table>
				
		
			</div>
			
		
			
		</div>
			
			





	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/zurb-responsive-tables/responsive-tables.css">

	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/zurb-responsive-tables/responsive-tables.js"></script>
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>