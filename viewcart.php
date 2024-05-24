
<html>
<head>
	<title></title>
	<?php require 'head.php';?>
</head>
<body>

<?php require 'menu.php';?>
<table class="table">
	<tr>
		<td>Vegetable Name</td>
		<td>Vegetable Price</td>
		<td>Quantity</td>
		<td>Total</td>
		<td>Order</td>
	</tr>


<?php
$q=mysqli_query($con,"select * from tblcart,tbladdvegetable where tbladdvegetable.v_id=tblcart.v_id  and tblcart.status='0' and tblcart.u_id=".$_SESSION['u_id']);
while ($r=mysqli_fetch_array($q)) {
	?>
	<Tr>
		<td>
	<?php echo $r["v_name"];?>
</td>
<td>
	<?php echo $r["v_discountprice"];?>
</td>
<td>
	<?php echo $r["v_quantity"];?>
</td>
<td>
	<?php echo $total= $r["v_quantity"]*$r["v_discountprice"];$ftotal+=$total;?>
</td>
<td>
	<a href="cancel.php?cart_id=<?php echo $r['cart_id'];?>"> Cancel</a>
	</td>
</Tr>
<?php
}

?>
<Tr>
	<td colspan="5">
		<center>
		<b><b>TOTAL : &nbsp
		<?php echo $ftotal;?></b></b></center>
	</td>
</Tr>
<tr>
	<Td colspan="5">
		<center><a href="bill.php"><input type="button" class="btn btn-success" value="Pay Bill" name=""> </a></center>
	</Td>
</tr>
</table>
<?php require 'footer.php';?>
</body>
</html>