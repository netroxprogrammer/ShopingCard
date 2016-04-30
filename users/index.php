<?php session_start();?>

<?php include_once 'includes/header.php' ?>
<?php 

//session_destroy();
$connection = new Database();
if(!isset($_SESSION['email']) && !isset($_SESSION['password']) && !isset($_SESSION['hidden'])){
header("Location: login.php?msg=Please Login");
	
}

 else if(isset($_SESSION['role']) && $_SESSION['role']!="user"){
	header("Location: logout.php?msg=PleaseLogin");
} 
else if((isset($_SESSION['hidden']) && isset($_SESSION['role']) && $_SESSION['role']=="user")){
			
	$hidden = $_SESSION['hidden'];
	
	$result =$connection->userProfile("select firstName, lastName,
			image from users where hidden='$hidden'");
	 global $row;
	if($result)
	{
		$row= $result->fetch_assoc();
	}
	else{
		?>
		
		<p class="bg-danger">Sorry  Error in your database</p>
		<?php 
	}
?>


<div class="jumbotron"> 
<div class="btn btn-default  btn-lg btn-block">DashBoard</div>
    <h3>Profile info</h3>
    <div class="col-xs-3 well ">
     <a href="" >
     <img src="<?php echo $row['image']?>" class=" img-thumbnail img-responsive" >
     <div class="caption">
     <h3> <?php echo $row['firstName']." " . $row['lastName']?></h3>
   
     <button type="button" class="btn btn-info btn-xs">Edit</button>
     </div> </a></div>
     </div>
     <br><br><br><br><br><br><br> <br><br><br><br><br><br><br>
     <div class="btn btn-primary  btn-lg btn-block">My Posts</div>
  <?php   
  $id = $_SESSION['id'];
  $sql = "Select *from productstack where user_ID='$id'"; 
   $result = $connection->showProducts($sql);
   if($result){
   	while($row = $result->fetch_assoc()){?>
   	<div class="row">
<div class="col-xs-12 well whilewell">
<a href="" >
     <img src="<?php echo $ip_address.$row['product_Photo']?>"  width="50%"  class=" img-thumbnail img-responsive" >
     <div class="caption">
     <h3> <?php echo $row['product_Name']; ?></h3>
    <font color="black"> Price:</font><small><?php echo $row['product_Price']?></small><br>
     <font color="black"> By:</font><small><?php echo $row['product_From'];?></small><br>
     <font color="black"> Category:</font><small><?php echo $row['product_From'];?></small><br>
    <font color="black">  Descreption:</font><small><?php echo $row['product_disc'];?></small><br>
     
     </div> </a>
<a href="<?php echo $row['product_Id']; ?>" class="btn btn-info btn-xs" >Edit</a>
<a href="<?php echo $row['product_Id']; ?>" class="btn btn-info btn-xs" >Add to Card</a>
<a href="<?php echo $row['product_Id']; ?>" class="btn btn-danger btn-xs" >Delete</a>
</div> 

</div>
   <?php 
   	}
   }
  
  ?>
     
<?php 
}
 ?>
<?php include_once 'includes/footer.php'; ?>