<html>
<head>
  <title>Vegetable Information</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    table td, table th {
      border: 1px solid black;
      padding: 8px;
    }

    table th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <table>
    <tr>
      <th>Vegetable Name</th>
      <th>Farmer Name</th>
      <th>Farmer Address</th>
      <th>Farmer Email</th>
      <th>Price</th>
    </tr>

<?php
require 'head.php';
require 'menu.php';

 // Update the database credentials

    $q = mysqli_query($con, "SELECT v.v_name, f.f_name, f.f_address, f.f_email, v.v_discountprice
      FROM tbladdvegetable AS v
      INNER JOIN tblcart AS c ON c.v_id = v.v_id
      INNER JOIN tbluser AS u ON f.f_id = c.f_id");

    while ($r = mysqli_fetch_array($q)) {
      ?>
      <tr>
        <td><?php echo $r["v_name"]; ?></td>
        <td><?php echo $r["f_name"]; ?></td>
        <td><?php echo $r["f_address"]; ?></td>
        <td><?php echo $r["f_email"]; ?></td>
        <td><?php echo $r["v_discountprice"]; ?></td>
      </tr>
      <?php
    }
    ?>

  </table>
</body>
</html>
