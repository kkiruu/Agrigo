<html>
<head>
    <title></title>
    <?php require 'head.php';?>
    <style>
        body {
            background-image: url('uploads/background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        /* Rest of your CSS styles */
        
        .card {
            background-color: transparent;
            border: none;
        }
    </style>
    <script>
        function togglePropertyDocRow() {
            var farmerRadio = document.getElementById("rbFarmer");
            var propertyDocRow = document.getElementById("propertyDocRow");
            propertyDocRow.style.display = farmerRadio.checked ? "table-row" : "none";
        }

        function showPopup() {
            alert("Sign up completed successfully!");
        }

        function validateForm() {
            var name = document.forms["registrationForm"]["txtname"].value;
            var password = document.forms["registrationForm"]["txtpass"].value;
            var email = document.forms["registrationForm"]["txtemail"].value;
            var phone = document.forms["registrationForm"]["txtphone"].value;
            var address = document.forms["registrationForm"]["txtaddress"].value;

            // Validate name, password, email, phone, and address fields
            if (name === "") {
                alert("Please enter your name");
                return false;
            }

            if (password === "") {
                alert("Please enter a password");
                return false;
            }

            if (password.length < 6) {
                alert("Password must be at least 6 characters long");
                return false;
            }

            if (email === "") {
                alert("Please enter your email");
                return false;
            }

            if (phone === "") {
                alert("Please enter your phone number");
                return false;
            }

            if (address === "") {
                alert("Please enter your address");
                return false;
            }
        }
    </script>

    
</head>
<body style="background-color:white;">
<?php 
if (isset($_POST['btnlogin'])) {
    extract($_POST);
    // Insert code for customer or farmer based on rblogin value
    if ($rblogin == "customer") {
        mysqli_query($con,"insert into tbluser(u_name,u_password,u_email,u_phone,u_address,u_gender)values('$txtname','$txtpass','$txtemail','$txtphone','$txtaddress','$rbgender')");
    } else if ($rblogin == "farmer") {
        // Handle farmer specific data and property document photo
        $propertyDocPhoto = $_FILES['property_doc_photo']['name'];
        $targetDir = "property_photos/";
        $targetFilePath = $targetDir . basename($propertyDocPhoto);
        move_uploaded_file($_FILES['property_doc_photo']['tmp_name'], $targetFilePath);

        mysqli_query($con,"insert into tblfarmer(f_name,f_password,f_email,f_phone,f_address,f_gender,property_doc_photo)values('$txtname','$txtpass','$txtemail','$txtphone','$txtaddress','$rbgender','$propertyDocPhoto')");
    }

    // Show the popup message after sign up
    echo '<script>showPopup();</script>';
}
?>

<?php require 'menu.php';?>
<div class="card-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center">

                    <div class="card-header"><h3><b>Sign Up</b></h3></div>
                    <div class="card-body">
                        <p class="card-text">
                        	 <form method="post" name="registrationForm" onsubmit="return validateForm()">
                            <form method="post" enctype="multipart/form-data">
                                <table class="table">
                                    <tr>
                                        <td>
                                            Name
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="txtname" required placeholder="Enter Only Letters">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Password
                                        </td>
                                        <td>
                                            <input type="password" class="form-control" name="txtpass" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Gender
                                        </td>
                                        <td>
                                            <input type="radio" checked name="rbgender" value="Male">Male
                                            <input type="radio" name="rbgender" value="Female">Female
                                        </td>
                                    </tr>
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
                                            Phone
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="txtphone">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address
                                        </td>
                                        <td>
                                            <textarea name="txtaddress" class="form-control" required></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Login
                                        </td>
                                        <td>
                                            <input type="radio" id="rbCustomer" name="rblogin" value="customer" checked onclick="togglePropertyDocRow()">Customer's
                                            <input type="radio" id="rbFarmer" name="rblogin" value="farmer" onclick="togglePropertyDocRow()">Farmer's
                                        </td>
                                    </tr>
                                    <tr id="propertyDocRow" style="display: none;">
                                        <td>
                                            Property Document Photo
                                        </td>
                                        <td>
                                            <input type="file" name="property_doc_photo" accept=".jpg, .jpeg, .png">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <input type="submit" class="btn btn-primary" name="btnlogin" value="Submit">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php';?>
</body>
</html>
