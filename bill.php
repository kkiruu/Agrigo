
<html>
<head>
	<title></title>
	<?php require 'head.php';?>
</head>
<body>

<?php require 'menu.php';?>

<?php
if(isset($_POST['btnpayment'])){
	extract($_POST);
	mysqli_query($con,"update tblcart set status='1' where u_id=".$_SESSION['u_id']);
	header("location:payment.php");
}

?>
<table class="table">
	<Tr>
		<TD>
			User name
		</TD>
		<td>
			<?php echo $_SESSION['u_name'];?>
		</td>
	</Tr>
	<Tr>
		<td>
			Address
		</td>
		<td>
			<?php echo $_SESSION['u_address'];?>
		</td>
	</Tr>
	<Tr>
		<td>
			Phone
		</td>
		<td>
			<?php echo $_SESSION['u_phone'];?>
		</td>
	</Tr>
</table>

<table class="table">
	<tr>
		<td>Vegetable Name</td>
		<td>Vegetable Price</td>
		<td>Quantity</td>
	</tr>


<?php
$q=mysqli_query($con,"select * from tblcart,tbladdvegetable where tbladdvegetable.v_id=tblcart.v_id and tblcart.status='0' and tblcart.u_id=".$_SESSION['u_id']);
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
</table>
<form method="post">
<table>
<tr>
<Td>
	<input type="submit" name="btnpayment" class="btn btn-success" value="Pay">
</Td>
</tr>
</table>
</form>
<?php require 'footer.php';?>
</body>
</html>