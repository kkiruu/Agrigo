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
    <!-- <script>function validateForm() {
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
		}</script> -->
</head>
<body>
<div class="navbar">
    <?php require 'menu.php';?>
</div>

<div class="card-header">
    
        <form method="post" action="#">
            <center>
                <div class="card-header">
                    <h3><b>Admin LOGIN</b></h3>
                </div>
            </center>
            <table class="table">
                <tr>
                    <td>Email</td>
                    <td><input type="text" class="form-control" name="email" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" class="form-control" name="password" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class="btn btn-primary" name="btn" value="Sign In">
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

<?php
    if(isset($_POST['btn']))
    {
        $uname=$_POST['email'];
        $pass=$_POST['password'];
        if($uname == 'admin' && $pass='admin')
        {
            echo "<script>location.href='admin'</script>";
        }
        else
        {
            echo "<script>alert('Wrong Creditionals');</script>";
        } 
    }
    else
    {
        echo "Not Clicked..";
    }
?>
