
<html>
<head>
	<title></title>
	<?php require 'head.php';?>
</head>
<body>

<?php require 'menu.php';?>
<input type="button" onclick="print()" name="" value="Print"><br>
Total No. Of farmer=
<?php
$q=mysqli_query($con,"select count(*) as totaluser from tblfarmer");
$r=mysqli_fetch_array($q);
echo $r['totaluser'];
?>


<table class="table">
	<tr>
		<td>Name</td>
		<td>Address</td>
		<td>Email</td>
		<td>Phone</td>
	</tr>


<?php
$q=mysqli_query($con,"select * from tblfarmer");
while ($r=mysqli_fetch_array($q)) {
	?>
	<Tr>
		<td>
	<?php echo $r["f_name"];?>
</td>
<td>
	<?php echo $r["f_address"];?>
</td>
<td>
	<?php echo $r["f_email"];?>
</td>
<td>
	<?php echo $r["f_phone"];?>
</td>
</Tr>
<?php
}

?>

</table>
<?php require 'footer.php';?>
</body>
</html>