<?php include_once 'includes/header.php' ?>
<?php 
session_start();
//session_destroy();

if(!isset($_SESSION['email']) && !isset($_SESSION['password']) && !isset($_SESSION['hidden'])){
header("Location: login.php?msg=Please Login");
	
}
else if(!isset($_SESSION['email']) && !isset($_SESSION['password']) 
		|| isset($_SESSION['hidden'])){
			$hidden = $_SESSION['hidden'];
	$connection = new Database();
	$result =$connection->userProfile("select firstName, lastName,
			image from users where hidden='$hidden'");
	 global $row;
	if($result)
	{
		$row= $result->fetch_assoc();
	}
?>


<div class="jumbotron">
    <h3>Profile info</h3>
    <div class="col-xs-3 well ">
     <a href="" >
     <img src="<?php echo $row['image']?>" class=" img-thumbnail img-responsive" >
     <div class="caption">
     <h3> <?php echo $row['firstName']." " . $row['lastName']?></h3>
   
     <button type="button" class="btn btn-info">Edit</button>
     </div> </a></div>
     </div>
<?php 
}
 ?>
<?php include_once 'includes/footer.php'; ?>