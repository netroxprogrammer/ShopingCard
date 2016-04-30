
<?php session_start();?>
<?php include_once 'includes/header.php' ?>

<?php 
//   start Sessions
$databaseConnection = new Database();
if(isset($_GET['message'])){
	?>
	<p class="bg-danger"><?php echo $_GET['message']; ?></p>
	<?php
}

/**
 * Check User Session Already Exist
 */

if(isset($_SESSION["email"]) && isset($_SESSION["password"]) ||
		 isset($_SESSION['hidden']) && isset($_SESSION['role']) && $_SESSION['role']=="user"){
	header("Location: index.php?msg=already Login");
	//session_destroy();
}


else{


if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password= $_POST['password'];
	if((isset($email) && !empty($email)) &&
			(isset($password) && !empty($password))){
		$sql = "select id,hidden,role from users where email='$email' AND password='$password'";
		$result = $databaseConnection->loginUser($sql);	
			if($result){
				$row = $result->fetch_assoc();
				if(isset($_POST['remember'])){
					$_SESSION["email"] = $email;
					$_SESSION["password"] =$password;
					$_SESSION["hidden"] =$row['hidden'];
					$_SESSION["role"] =$row['role'];
					$_SESSION["id"] =$row['id'];
					//echo $_SESSION["email"];
				
				}
				
				$_SESSION["hidden"] =$row['hidden'];
				$_SESSION["role"] =$row['role'];
				$_SESSION["id"] =$row['id'];
				//echo $_SESSION["email"];
				header("Location: index.php?msg=Successfully Login");
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