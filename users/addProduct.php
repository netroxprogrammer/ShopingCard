<?php session_start(); ?>
<?php include_once 'includes/header.php'; ?>

<?php include_once 'includes/slideShow.php'; ?><br>
<?php 

if(!isset($_SESSION['email']) && !isset($_SESSION['password']) && !isset($_SESSION['hidden'])){
	header("Location: login.php?msg=Please Login");

}
else if(isset($_SESSION['role']) && $_SESSION['role']!="user"){
	header("Location: logout.php?msg=PleaseLogin");
}

else if(!isset($_SESSION['email']) && !isset($_SESSION['password'])
		|| isset($_SESSION['hidden'])){
	
if(isset($_POST['submit'])){
	$upload = new Upload();
	$dbConnection = new Database();
	
	if(isset($_POST["PName"]) && !empty($_POST["PName"])&&
	isset($_POST["PPrice"]) && !empty($_POST["PPrice"]) &&
	isset($_POST["PDis"]) && !empty($_POST["PDis"]) &&
	isset($_POST["category"]) && !empty($_POST["category"]) &&
	isset($_POST["POwner"]) && !empty($_POST["POwner"])){
		$PName =$_POST["PName"];
		$PPrice= $_POST["PPrice"];
		$PDis = $_POST["PDis"];
		//$file = $_POST["file"];
		$category = $_POST["category"];
		$POwner = $_POST["POwner"];
		$photoPath=$usersUplaod.$upload->uploadImage();
		$UserId=$_SESSION["id"];
	/* $sql = "INSERT into productstack(product_Id,product_Name,product_Price,
			product_disc,product_Photo,product_From,product_Category) values
			('$PName','$PPrice','$PDis','$path','$category','$POwner')"; */
		
	$sql = "INSERT into productstack(product_Name,product_Price,
	product_disc,product_Photo,product_From,product_Category,user_ID) values
	('$PName','$PPrice','$PDis','$photoPath','$POwner','$category','$UserId')";
		$result =$dbConnection->uploaddProduct($sql);
		if($result){
			header("Location: addProduct.php?msg=Image Uplaod SuccessFully");
		}
		else{
			header("Location: addProduct.php?message=Sorry Data Not Uplaod SuccessFully");
		}
	}
	
}
}

?>
<div class="row">
<div class="col-xs-12 well ">
<p  class="btn btn-success btn-lg btn-block">Add Product</p>
</div>
</div>

<form  role="form" method="post" enctype="multipart/form-data">

<div class="row">             <!-- Start Row -->
<div class="col-xs-3 well">   <!-- Start Col -->
  <div class="form-group">
    <label  for="PName">Product Name</label>
    <input type="text" class="form-control" name="PName" placeholder="Product Name">
  </div>
</div> <!-- End Col --> 
<div class="col-xs-3 col-xs-offset-1 well ">      <!-- Start Col -->
<div class="form-group">
    <label  for="PPrice">Product Price</label>
    <div class="input-group">
      <div class="input-group-addon">PAK</div>
      <input type="text" class="form-control" name="PPrice" placeholder="Product Price">
      <div class="input-group-addon">.00</div>
    </div>
  </div>  
  </div>
  <!-- End Col --> 
  
  <div class="col-xs-3 col-xs-offset-1 well ">      <!-- Start Col -->
  <div class="form-group">
    <label for="file">Chose Photo</label>
    <input type="file" name="file" id="file">
    
  </div>
   </div>
  <!-- End Col --> 

  </div> <!--  End Row -->
  
  <div class="row">
  <div class="col-xs-12 well">
   <div class="form-group">
      <label for="Discription">Discription</label>
      <textarea class="form-control" rows="5" name="PDis"></textarea>
    </div>
  </div>
  </div>
  
  
    <div class="row">
  <div class="col-xs-12 well">
   <label for="category">Category</label>
   <select name="category" class="form-control">
  <option>Games</option>
  <option>Videos</option>
  <option>Cds</option>
  <option>Clothes</option>
  <option>Toys</option>
  <option>Books</option>
  <option>Mobiles</option>
  <option>Computers</option>
</select>
  </div>
  </div>
  <div class="row">             <!-- Start Row -->
<div class="col-xs-3 well">   <!-- Start Col -->
  <div class="form-group">
    <label  for="POwner">Product Owner</label>
    <input type="text" class="form-control" name="POwner" placeholder="Product Owner">
  </div>
</div> <!-- End Col --> 
</div>
  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Post Product" name="submit">
<?php include_once 'includes/footer.php'; ?>
