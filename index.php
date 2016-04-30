<?php session_start(); ?>
 <?php include_once 'admin/includes/header.php'; ?> 
 <? include_once 'admin/includes/slideShow.php'; ?>
<?php include_once 'config/Links.php'; ?>
<?php 
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
     <a href="<?php echo $row['product_Id']; ?>" class="btn btn-info btn-xs" >Add to Card</a>
     <?php }?>
     </div> 

</div>
<?php endwhile;  } ?>
<?php include_once 'users/includes/footer.php';?>