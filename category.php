
<?php



include('classes/categoryclass.php');
$obj=new  Data;
if (isset($_POST['submit'])) {
	$categoryname=$_POST['categoryname'];
	$obj->savecategory($categoryname);
}
$point=$obj->getAllcategoryData();

if (isset($_GET['delid'])) 
{
	$obj->deletecategoryData($_GET['delid']);
	header( "location:category.php");
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



	<title></title>

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
	<!-- <a href="logout.php">LogOut</a> -->
			<!-- working place -->
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							<h1 style="margin-left:200px; font-size: 50px;  ">Add Category</h1>
						</div>
						
						
					</div>
					
					<div class="panel-body">
						
						<form action="category.php" method="POST" role="form" class="form-horizontal form-groups-bordered">


							
			
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Category</label>
								
								<div class="col-sm-5">
									<input type="text" name="categoryname" class="form-control" id="field-1" placeholder="Enter category---Name"required>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" name="submit" class="btn btn-default">submit</button>
								</div>
							</div>
							
		
						</form>
						
					</div>
					<div class="col-md-6">
				
				
				
				<table class="table table-hover" style="margin-left: 100px; margin-top: 50px;">
					<thead>
						<tr>
							<th>#</th>
							<th>Section</th>
							
							<th colspan="2"> Action</th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach ($point as $point):?>
						<tr>
							
							<td><?php echo $point['category_id'] ;?></td>
							<td><?php echo $point['categoryname'] ;?></td>
							
							<td><a class="icon" id="delete" href="category.php?delid=<?php echo $point['category_id' ];?>"><i style="font-size: 20px; color: #000;" class="glyphicon glyphicon-trash" ></i></a></td>

							<td><a href="editcategory.php?editid=<?php echo $point['category_id' ];?>"><i style="font-size: 20px; color: #000;" class="glyphicon glyphicon-edit "></i></a></td>
							
						</tr>
						<?php endforeach;?>
						
						
						
					</tbody>
				</table>
				
			</div>
				
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