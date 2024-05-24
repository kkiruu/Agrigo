<html>
<head>
    <title>Add Vegetable</title>
    <?php require 'head.php';?>
    <style>
        body {
            background-image: url('uploads/background.jpg');
            background-size: cover;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.0);
        }
    </style>
</head>
<body>
    <?php require 'fmenu.php';?>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td>Choose Category</td>
                                <td>
                                    <select name="cmbaddcategory" class="form-control">
                                        <?php
                                        $q = mysqli_query($con,"SELECT * FROM tbladdcategory");
                                        while ($r = mysqli_fetch_array($q)) {
                                            ?>
                                            <option value="<?php echo $r['c_id'];?>"><?php echo $r["c_name"];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td>
                                    <select name="cmbaddlocation" class="form-control">
                                        <?php
                                        $q = mysqli_query($con,"SELECT * FROM tbllocation");
                                        while ($r = mysqli_fetch_array($q)) {
                                            ?>
                                            <option value="<?php echo $r['lid'];?>"><?php echo $r["lname"];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Product Name</td>
                                <td><input type="text" class="form-control" name="txtj_name" required></td>
                            </tr>
                            <tr>
                                <td>Product Price</td>
                                <td><input type="text" class="form-control" name="txtj_price" required></td>
                            </tr>
                            <tr>
                                <td>Product Discount Price</td>
                                <td><input type="text" name="txtj_discountprice" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Product Description</td>
                                <td><textarea name="txtj_description" class="form-control" required></textarea></td>
                            </tr>
                            <tr>
                                <td>Product Stock</td>
                                <td><input type="text" name="textj_stock" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Product Image</td>
                                <td><input type="file" name="fileToUpload" required></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" class="btn btn-success" name="btnaddvegetable" value="Add Vegetable">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
        mysqli_query($con,"insert into tbladdvegetable(v_name,v_price,v_discountprice,v_description,v_stock,v_image,c_id) values('$txtj_name','$txtj_price','$txtj_discountprice','$txtj_description','$textj_stock','$target_file','$cmbaddcategory')");

        // Get the last inserted vegetable ID
        $vegetable_id = mysqli_insert_id($con);

        // Get the current farmer ID from session or wherever you have it stored
        $farmer_id = $_SESSION["f_id"];

        // Insert the vegetable ID and farmer ID into tblcart
        mysqli_query($con, "INSERT INTO tblcart (v_id, f_id) VALUES ('$vegetable_id', '$farmer_id')");
    }
    ?>

    <?php require 'footer.php';?>
</body>
</html>
