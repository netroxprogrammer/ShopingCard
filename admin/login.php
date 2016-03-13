<?php include_once 'includes/header.php' ?>

<?php 
session_start(); //   start Sessions
$databaseConnection = new Database();
if(isset($_GET['message'])){
	?>
	<p class="bg-danger"><?php echo $_GET['message']; ?></p>
	<?php
}
if(isset($_SESSION["email"]) && isset($_SESSION["password"])){
	header("Location: index.php");
	//session_destroy();
}
else{


if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password= $_POST['password'];
	if((isset($email) && !empty($email)) &&
			(isset($password) && !empty($password))){
		$sql = "select *from users where email='$email' AND password='$password'";
		$result = $databaseConnection->loginUser($sql);	
			if($result==true){
				if(isset($_POST['remember'])){
					$_SESSION["email"] = $email;
					$_SESSION["password"] =$password;
					echo $_SESSION["email"];
				}
			//	echo"Match";
				
			}
			else{
				header("Location: login.php?message=Sorry Wrong User");
			}
	}
}
}
?>
<form class="form-data" method="post">
<h2>Sign Up</h2>
<input type="email" class="input-block-level"  name="email" placeholder="Email">
<input type="password" class="input-block-level" name="password" placeholder="Password" ><br>
          <input type="checkbox" name="remember" value="remember-me"> Remember me<br>
<input type="submit" class="btn btn-default" value="Sign In" name="submit">
<a href="" class="btn btn-default">Sign up</a>
</form>
<?php include_once 'includes/footer.php'; ?>