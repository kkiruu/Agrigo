<html>
<head>
    <title> FARMER'S LOGIN</title>
    <?php require 'head.php';?>
    <style>
        body {
            background-image: url('uploads/background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .card {

            max-width: 400px;
            padding: 400px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .navbar {
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        .footer {
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="navbar">
    <?php require 'menu.php';?>
</div>
<?php
if(isset($_POST['btnlogin'])){
    extract($_POST);
    $q=mysqli_query($con,"select * from tblfarmer where f_email='$txtemail' and f_password='$txtpassword'");
    if(mysqli_num_rows($q)>0){
        $_SESSION["f_email"]=$txtemail;
        $q1=mysqli_query($con,"select * from tblfarmer where f_email='".$_SESSION['f_email']."'");
        $r1=mysqli_fetch_array($q1);
        $_SESSION["f_id"]=$r1["f_id"];
        $_SESSION["f_name"]=$r1["f_name"];
        $_SESSION["f_email"]=$r1["f_email"];
        $_SESSION["f_address"]=$r1["f_address"];
        $_SESSION["f_phone"]=$r1["f_phone"];
        header("location:fwelcome.php");
    }
    else{
        echo "Invalid Credentials";
    }
}
?>
<div class="card-header">
    <form method="post">
        <center>
            <div class="card-header">
                <h3><b>FARMER'S LOGIN</b></h3>
            </div>
        </center>
        <table class="table">
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input type="email" class="form-control" name="txtemail" required>
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type="password" class="form-control" name="txtpassword" required>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" class="btn btn-primary" name="btnlogin" value="Sign In">
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="footer">
    <?php require 'footer.php';?>
</div>
</body>
</html>
