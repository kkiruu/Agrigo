<?php
require 'head.php';
mysqli_query($con, "delete from tblcart where cart_id=" . $_GET["cart_id"]);
header("location:viewcart.php");
?>
