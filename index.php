<?php session_start(); ?>
 <?php include_once 'admin/includes/header.php'; ?> 
 <? include_once 'admin/includes/slideShow.php'; ?>
<?php include_once 'config/Links.php'; ?>
<?php 
global  $id;
if(isset($_SESSION['hidden']) && isset($_SESSION['role'])=="admin"){

	$links = new SetLinks();
$links->addLinks("index.php","admin/addProduct.php","","","");
//$links->addProductPage="admin/addProduct.php";

}

	?>
<?php 

$connection = new Database();
$sql = "Select *from productstack";
$result =$connection->showProducts($sql);
if($result){
?>
<div class="container">
  <div class="jumbotron">
<h3>Categories:</h3>
  <marquee behavior="scroll" direction="left" onmousedown="this.stop();" onmouseup="this.start();">

  <?php $sql = "Select *from categories";
	$categories =$connection->showProducts($sql);?>
	<?php while($catg= $categories->fetch_assoc()){ ?>
   
  <button type="button" class="btn btn-primary"><?php echo $catg["category_Name"]; ?></button>
  <?php }?>
  </marquee>
  <div class="row">
  <div class="col-xs-5 col-xs-offset-10">
   <img src="images/addcard.png" height="12%" width="15%">
   <?php 
   
   if(isset( $_SESSION["user"])){
   $id = $_SESSION["user"];
    
   ?>
  <button type="button" class="btn btn-primary"><span class="badge"><?php echo count($id);?></span></button>
 <?php 
}
else{
	
}
 ?>
  </div> 
  </div>
 
  </div>
  </div>

<?php while($row=$result->fetch_assoc()):  ?>
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
<?php if(isset($_SESSION['hidden']) && isset($_SESSION['role'])=="admin" ||  isset($_SESSION['role'])=="user") { ?> 
     <a href="addCard.php?id=<?php echo $row['product_Id']; ?> & name= <?php echo $row['product_Name'];?>" class="btn btn-info btn-xs" >Add to Card</a>
     <?php }?>
     </div> 

</div>
<?php endwhile;  } ?>
<?php include_once 'users/includes/footer.php';?>