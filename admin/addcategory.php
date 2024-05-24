
<html>
<head>
	<title></title>
	<?php require 'head.php';?>
</head>
<body>
<?php require 'menu.php';?>
<?php
if(isset($_POST["btnsave"])){
	extract($_POST);
	mysqli_query($con,"insert into tbladdcategory(c_name)values('$txtc_name')");
}

?>
<form method="post">
	<table class="table">
		<tr>
			<tD>
				Category Name
			</tD>
			<td>
				<input type="text" class="form-control" name="txtc_name" required>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" class="btn btn-success" name="btnsave" value="Add Category">		
			</td>
		</tr>
	</table>
</form>
	</table>
<?php require 'footer.php';?>
</body>
</html>