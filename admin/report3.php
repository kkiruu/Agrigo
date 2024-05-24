<?php require 'head.php';?>

<div class="container">
  <h2>Report 3: Customers Who Purchased Vegetables from Farmers</h2>

  <table class="table">
    <thead>
      <tr>
        <th>Customer Name</th>
        <th>Vegetable Name</th>
        <th>Farmer Name</th>
      </tr>
    </thead>
    <tbody>
     <?php
$q = mysqli_query($con, "SELECT tbluser.u_name, tblfarmer.f_name, tbladdvegetable.v_name
                         FROM tblcart
                         INNER JOIN tbladdvegetable ON tbladdvegetable.v_id = tblcart.v_id
                         INNER JOIN tblfarmer ON tblfarmer.f_id = tbladdvegetable.f_id
                         INNER JOIN tbluser ON tbluser.u_id = tblcart.u_id");

if (!$q) {
    echo "Error: " . mysqli_error($con);
} else {
    if (mysqli_num_rows($q) > 0) {
        ?>
        <table class="table">
            <tr>
                <th>Customer Name</th>
                <th>Farmer Name</th>
                <th>Vegetable Name</th>
            </tr>
            <?php
            while ($r = mysqli_fetch_array($q)) {
                ?>
                <tr>
                    <td><?php echo $r["u_name"]; ?></td>
                    <td><?php echo $r["f_name"]; ?></td>
                    <td><?php echo $r["v_name"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    } else {
        echo "No records found.";
    }
}
?>
 </tbody>
  </table>
</div>

<?php require 'footer.php';?>
