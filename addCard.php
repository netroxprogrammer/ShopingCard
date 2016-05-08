<?php session_start(); ?>
<?php include_once 'admin/includes/header.php'; ?>

<?php include_once 'includes/slideShow.php'; ?><br>
<?php 

if(!isset($_SESSION['email']) && !isset($_SESSION['password']) && !isset($_SESSION['hidden'])){
	header("Location: login.php?msg=Please Login");

}
else{
	$id = $_GET["id"];
	$name = $_GET["name"];
	echo $name;
	
	$user_arr = array ( $name => $id);
	
	$_SESSION['user'][] = $user_arr;
	
	
	//echo count($_SESSION['user']);
	
	
	header("Location: index.php");
	
}

?>