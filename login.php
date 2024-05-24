<html>
<head>
    <title></title>
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
			max-width: 500px; /* Adjust the value to match the farmer login card */
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
    <script>function validateForm() {
			var email = document.forms["loginForm"]["txtemail"].value;
			var password = document.forms["loginForm"]["txtpassword"].value;

			// Validate email and password fields
			if (email === "") {
				alert("Please enter your email");
				return false;
			}

			if (password === "") {
				alert("Please enter your password");
				return false;
			}

			if (password.length < 6) {
				alert("Password must be at least 6 characters long");
				return false;
			}
		}</script>
</head>
<body>
<div class="navbar">
    <?php require 'menu.php';?>
</div>
<?php
if(isset($_POST['btnlogin'])){
    extract($_POST);
    $q=mysqli_query($con,"SELECT * FROM tbluser WHERE u_email='$txtemail' AND u_password='$txtpassword'");
    if(mysqli_num_rows($q) > 0){
        $row = mysqli_fetch_assoc($q);
        $_SESSION["u_id"] = $row["u_id"];
        $_SESSION["u_name"] = $row["u_name"];
        $_SESSION["u_email"] = $row["u_email"];
        $_SESSION["u_address"] = $row["u_address"];
        $_SESSION["u_phone"] = $row["u_phone"];
        header("location: welcome.php");
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
                    <h3><b>CUSTOMER'S LOGIN</b></h3>
                </div>
            </center>
            <table class="table">
                <tr>
                    <td>Email</td>
                    <td><input type="email" class="form-control" name="txtemail" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" class="form-control" name="txtpassword" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class="btn btn-primary" name="btnlogin" value="Sign In">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="footer">
    <?php require 'footer.php';?>
</div>
</body>
</html>
