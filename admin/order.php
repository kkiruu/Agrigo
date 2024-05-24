
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
		<td>Status</td>
	</tr>


<?php
$q=mysqli_query($con,"select * from tblcart,tbladdvegetable where tbladdvegetable.v_id=tblcart.v_id and tblcart.status='1'");
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
	<?php echo $r["deliverystatus"];?>
</td>
</Tr>
<?php
}

?>
<Tr>
	<td>
		Bill
	</td>
	<td>
		<?php echo $ftotal;?>
	</td>
</Tr>
<tr>
</tr>
</table>
<?php require 'footer.php';?>
</body>
</html>