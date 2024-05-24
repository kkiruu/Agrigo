<html>
<head>
    <title>Admin Login</title>
    <?php require 'head.php';?>
</head>
<body>

<?php require 'menu.php';?>

<?php
// Add this line to start the session

if(isset($_POST['btnlogin'])){
    extract($_POST);
    $q=mysqli_query($con,"SELECT * FROM tbladmin WHERE aemail='$txtemail' AND a_password='$txtpassword'");
    if(mysqli_num_rows($q) > 0){
        $row = mysqli_fetch_assoc($q);
        $_SESSION["a_id"] = $row["a_id"];
        $_SESSION["a_name"] = $row["a_name"];
        $_SESSION["a_email"] = $row["aemail"];
        header("location: admin.php");
        exit(); // Add this line to stop further execution of the code
    }
    else{
     header("location: menu.php");   
    }
}
?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form method="post">
            <center>
                <div class="card-header"><h3><b>ADMIN'S LOGIN</b></h3></div>
            </center>
            <table class="table" height="350px">
                <tr>
                    <td>Email</td>
                    <td><input type="email" class="form-control" name="txtemail"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" class="form-control" name="txtpassword"></td>
                </tr>
                <tR>
                    <Td colspan=2 align=center>
                        <input type="submit" class="btn btn-primary" name="btnlogin" value="Login">
                    </Td>
                </tR>
            </table>
            <?php if(isset($error)) { ?>
                <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
            <?php } ?>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>

<?php require 'footer.php';?>
</body>
</html>
