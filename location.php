<html>
<head>
    <title>Add Location</title>
    <?php require 'head.php';?>
    <style>
        body {
            background-image: url('uploads/background.jpg');
            background-size: cover;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.7);
            margin: 0 auto;
            max-width: 400px;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
            border: none; /* Remove the border */
        }
    </style>
</head>
<body>
    <?php require 'fmenu.php';?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if(isset($_POST["btnsave"])){
                            extract($_POST);
                            mysqli_query($con, "INSERT INTO tbllocation(lname) VALUES ('$txtc_name')");
                        }
                        ?>
                        <form method="post">
                            <table class="table">
                                <tr>
                                    <td>Location Name</td>
                                    <td><input type="text" class="form-control" name="txtc_name" required></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <input type="submit" class="btn btn-success" name="btnsave" value="Add Location">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <?php require 'footer.php';?>
    </footer>
</body>
</html>
