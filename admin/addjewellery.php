<html>
<head>
	<title></title>
	<?php require 'head.php';?>
</head>
<body>
<?php require 'menu.php';?>
<?php
if(isset($_POST["btnaddvegetable"])){
	extract($_POST);
	$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
	mysqli_query($con,"insert into tbladdvegetable(v_name,v_price,v_discountprice,v_description,v_stock,v_image,c_id)values('$txtj_name','$txtj_price','$txtj_discountprice','$txtj_description','$textj_stock','$target_file','$cmbaddcategory')");
}

?>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
<form method="post" enctype="multipart/form-data">
	<table class="table">
		<tR>
			<td>
				Choose Category
			</td>
			<td>
				<select name="cmbaddcategory" class="form-control">
					<?php
						$q=mysqli_query($con,"select * from tbladdcategory");
						while ($r=mysqli_fetch_array($q)) {
							?>
							<option value="<?php echo $r['c_id'];?>"><?php echo $r["c_name"];?></option>
							<?php
						}
					?>
				</select>
		</tR>
		<tr>
			<tD>
				Vegetable Name
			</tD>
			<td>
				<input type="text" class="form-control" name="txtj_name" required>
			</td>
		</tr>
		<tr>
			<tD>
				Vegetable Price
			</tD>
			<td>
				<input type="text" class="form-control" name="txtj_price" required>
			</td>
		</tr>
		<tr>
			<tD>
				Vegetable Discount Price
			</tD>
			<td>
				<input type="text" name="txtj_discountprice" class="form-control" required>
			</td>
		</tr>
		
		<tr>
			<tD>
				Vegetable Description
			</tD>
			<td>
				<textarea name="txtj_description" class="form-control" required></textarea>
			</td>
		</tr>
		<tr>
			<tD>
				Vegetable Stock
			</tD>
			<td>
				<input type="text" name="textj_stock" class="form-control" required>
			</td>
		</tr>
		<tr>
			<tD>
				Vegetable Image
			</tD>
			<td>
				<input type="file"  name="fileToUpload" required>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" class="btn btn-success" name="btnaddvegetable" value="Add Vegetable">		
			</td>
		</tr>
	</table>
</form>
</div>
<?php require 'footer.php';?>
</body>
</html>