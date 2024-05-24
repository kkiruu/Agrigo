
<html>
<head>
	<title></title>
	<?php require 'head.php';?>
</head>
<body>

<?php require 'menu.php';?>
<form method="post">
	<table class="table">
		<Tr>
			<td>
				Search By Category
			</td>
			<td>
				<select name="cmbcategory" class="form-control">
					<?php
						$q=mysqli_query($con,"select * from tbladdcategory");
						while ($r=mysqli_fetch_array($q)) {
							?>
							<option value="<?php echo $r['c_id'];?>"><?php echo $r["c_name"];?></option>
							<?php
						}
					?>
				</select>
			</td>
			<Td>
				<input type="submit" class="btn btn-primary" name="btnsearchbycat" value="Search">
			</Td>
		</Tr>
		<Tr>
			<td>
				Location
			</td>
			<td>
				<select name="cmbcategory" class="form-control">
					<?php
						$q=mysqli_query($con,"select * from tbllocation");
						while ($r=mysqli_fetch_array($q)) {
							?>
							<option value="<?php echo $r['lid'];?>"><?php echo $r["lname"];?></option>
							<?php
						}
					?>
				</select>
			</td>
			<Td>
				<input type="submit" class="btn btn-primary" name="btnsearchbycat" value="Search">
			</Td>
		</Tr>
		<Tr>
			<td>
				Search
			</td>
			<td>
				<input type="text" class="form-control" name="txtsearch">
			</td>
			<Td>
				<input type="submit" class="btn btn-primary" name="btnsearch" value="Search">
			</Td>
		</Tr>
	</table>
	</table>
	</form>
<div class="row">
<?php
if(isset($_POST['btnsearch'])){
	extract($_POST);
$q=mysqli_query($con,"select * from tbladdvegetable where v_name like '%".$txtsearch."%'");
}
else if(isset($_POST['btnsearchbycat'])){
	extract($_POST);
$q=mysqli_query($con,"select * from tbladdvegetable where c_id='$cmbcategory'");
}
else{
$q=mysqli_query($con,"select * from tbladdvegetable");
}
while ($r=mysqli_fetch_array($q)) {
	?>
	<div class="col-md-3">
	<div class="card">
  <img src="admin/<?php echo $r['v_image'];?>" height="400px" width="200px" class="card-img-top" alt="poor network"/>
  <div class="card-body">
    <h5 class="card-title"><?php
	echo $r["v_name"];?></h5>
    <p class="card-text">
    	<table class="table">
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
    	</table>


    </p>
    <a href="viewdetails.php?id=<?php echo $r['v_id'];?>" class="btn btn-primary">Viewdetails</a>
  </div>
</div>
</div>
<?php
}

?>
<?php require 'footer.php';?>
</body>
</html>