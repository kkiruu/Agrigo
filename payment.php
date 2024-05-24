<html>
<head>
	<title></title>
	<?php require 'head.php';?>
</head>
<body>
	<?php require 'menu.php';?>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	<div class="card">
  <img src="proimages/payment1.jpg" height="400px" width="200px" class="card-img-top" alt="Something is Wrong"/>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">
    	<table class="table">
    		<tr >
    			<td>
    				<center><b><b>PAYMENT</b></b>
    				<br><br>
    				Choose your payment method:
    			</td>
    		</tr>
    		<tr>
    			<td>
    				<form action="paid.php" method="POST">
    					<input type="radio" name="payment_method" value="credit_card"> Credit Card<br>
    					<input type="radio" name="payment_method" value="credit_card"> By Cash<br>
    					<input type="radio" name="payment_method" value="paypal"> PayPal<br>
    					<input type="radio" name="payment_method" value="bank_transfer"> Bank Transfer<br>
    					<input type="submit" class="btn btn-primary" value="Proceed to Payment">
    				</form>
    			</td>
    		</tr>
    	</table>
    </p>
  </div>
</div>
</div>
<?php require 'footer.php';?>
</body>
</html>
