<html>
<head>
	<title></title>
	<?php require 'head.php';?>
</head>
<body>

<?php require 'menu.php';?>
<input type="button" onclick="print()" name="" value="Print"><br>


<form method="post">
	<table>
		<tr>
			<td>
				Year
			</td>
			<td>
				<select name="cmbyear">
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
				</select>
			</td>
		</tr>

		<tr>
			<td>
				Month
			</td>
			<td>
				<select name="cmbmonth">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="btnshow" value="Show">
			</td>
		</tr>
	</table>
</form>
<?php
if(isset($_POST['btnshow'])){
	extract($_POST);
	$q=mysqli_query($con,"SELECT v.v_name, f.f_name, u.u_name, u.u_address, u.u_email, v.v_discountprice
			FROM tbladdvegetable AS v
			INNER JOIN tblcart AS c ON c.v_id = v.v_id
			INNER JOIN tbluser AS u ON u.u_id = c.u_id
			INNER JOIN tblfarmer AS f ON f.f_id = v.f_id
			WHERE c.month='$cmbmonth' AND c.year='$cmbyear' AND c.status='1'");

	$total = 10000;

	while($r=mysqli_fetch_array($q)){
		$total += $r['v_discountprice'] * $r['v_quantity'];
	}
	
	echo "Total Profit: " . $total;
}
?>

<?php require 'footer.php';?>
</body>
</html>
