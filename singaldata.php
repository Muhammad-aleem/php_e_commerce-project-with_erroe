<?php
include('classes/checkclass.php');
$obj=new  Checkclass;

$show=$obj->getAllorderData();

// var_dump($show);
// die();

if(isset($_GET['editid']))
{
	$singal = $obj->getSingleorderData($_GET['editid']);
	// var_dump($singal);
	// die();
	
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
	


				<div class="container">
					
				
			
			
		<center><h2><b> Order Details </b></h2></center>
	

		<hr>
		
						

					

		<div class="row">
			
			<div class="col-md-12">
				
				
				
				<table class="table responsive" >
					
					
					<thead>
						<tr>
							<b>
							<th><b>Product_Name</b></th>
							<th>Price</th>
							<th>image</th>
							
							</b>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($show as $shows):?>

					<tr>
						<td><?php echo $shows['productname'];?></td>
						<td><?php echo $shows['price'];?></td>
						<td><?php echo $shows['image'];?></td>
							
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