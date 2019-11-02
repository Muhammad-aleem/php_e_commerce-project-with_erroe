
<?php
include('classes/categoryclass.php');
$obj=new  Data;

if (isset($_POST['submit'])) {
	$categoryname=$_POST['categoryname'];

	$obj->updatecategoryData($categoryname,$_GET['editid']);
	header( "location:category.php");
}
$point=$obj->getAllcategoryData();


if(isset($_GET['editid']))
{
	$singal = $obj->getSinglecategoryData($_GET['editid']);
	// var_dump($singal);
	// die();
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Category</title>
</head>
<body>
	<center><h1><b>Category</b></h1></center>
	<form method="POST" accept="category.php" >
		<center>
	<label><b>Name</b></label>
	<input type="text" name="categoryname" placeholder="update the name.." value="<?php echo $singal ['categoryname'];?>">
	<button  type="submit" name="submit" >update</button>
	</center>
	</form>
	


</body>
</html>