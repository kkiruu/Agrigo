<html>
<head>
	<title></title>
	<?php require 'head.php';?>
	
</head>
<body>

<?php require 'menu.php';?>
<br>
<br>
<?php
if(isset($_POST["btnaddcart"])){
	extract($_POST);

	$q=mysqli_query($con,"select * from tbladdvegetable where v_id=".$_GET['id']);
	$r=mysqli_fetch_array($q);
	$oldstock=$r['v_stock'];
	$newstock=$oldstock-$txtquantity;
	if($newstock>=0){
		mysqli_query($con,"update tbladdvegetable set v_stock='$newstock' where v_id=".$_GET['id']);
		$year=date('Y');
		$month=date('m');
		mysqli_query($con,"insert into tblcart(v_id,v_quantity,u_id,status,deliverystatus,month,year)values('".$_GET["id"]."','$txtquantity','".$_SESSION['u_id']."','0','Not Delivered','$month','$year')");

		// Show success message
		echo '<script type="text/javascript">alert("Added to cart successfully!");</script>';
	}
	else{
		// Show out of stock message
		echo '<script type="text/javascript">alert("Out of stock!");</script>';
	}

}
?>
<div class="row">

<?php
$q=mysqli_query($con,"select * from tbladdvegetable where v_id=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {
	?>
	<div class="col-md-4"></div>
	<div class="col-md-4">

	<div class="card">
		<img src="admin/<?php echo $r['v_image'];?>" class="card-img-top" alt="Fissure in Sandstone"/>
		<div class="card-body">
			<h5 class="card-title"><?php echo $r["v_name"];?></h5>
			<p class="card-text">
				<form method="post">
					<table class="table" align="center">
						<tR>
							<td>
								₹<strike><?php echo $r['v_price'];?></strike>/-
							</td>
						</tR>
						<tR>
							<td>
								₹<?php echo $r['v_discountprice'];?>/-
							</td>
						</tR>
						<Tr>
							<td>
								Accordingly 1kg, 1 Bunch, etc.
								<input type="number" name="txtquantity" placeholder="Enter Quantity" required>
							</td>
						</Tr>
						<tr>
							<Td colspan="2">
								<input type="Submit" name="btnaddcart" value="Add To Cart" class="btn btn-success" style="margin-left: 30%;">
							</Td>
						</tr>
					</table>
				</form>
			</p>
		</div>
	</div>
</div>
<?php
}

?>
<br>
<br>
<?php require 'footer.php';?>
</body>
</html>
