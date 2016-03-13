<?php include_once 'users/includes/header.php'; ?>
<?php 

$connection = new Database();

?>

      <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" class="input-block-level" placeholder="Email address">
        <input type="password" class="input-block-level" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
          <label class="checkbox">
          <input type="checkbox" value="remember-me"> Forget Password
        </label>
        
        <button class="btn btn-large btn-primary" type="submit">Sign in</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="" class="btn btn-large btn-primary" type="submit">Sign Up</a>
      </form>
<?php include_once 'users/includes/footer.php';?>