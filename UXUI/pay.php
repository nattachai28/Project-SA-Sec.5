<?php
	include("connection.php");
    if(isset($_POST['accept'])){
		
        require_once "login.php";

		$email = $_SESSION['email'];
		$payment_option = $_POST['payment_op'];
		$bank = $_POST['bank'];
        $bank_number = $_POST['bank_number'];
	
		$query = "INSERT INTO payment (email, payment_method, bank, bank_number)
					VALUE ('$email', '$payment_option', '$bank', '$bank_number')";
		$result = mysqli_query($conn, $query);

		if ($result) {
			echo ("<script LANGUAGE='JavaScript'>
                window.alert('Succesfully Payment');
                window.location.href='Menuscreen.php';
            </script>");
		} else {
			echo ("<script LANGUAGE='JavaScript'>
                window.alert('Already send detail');
                window.location.href='Menuscreen.php';
            </script>");
		}
	}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="pay1.css">
<html>
<head>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

<div class="wrapper">
	<header class="top-header">
		<input type="submit" class="home" name="home" value="">
		<div class="toppy">
			<?php
				include "connection.php"; require "login.php";
				$records = mysqli_query($conn,"select email from user"); // fetch data from database
				while($data = mysqli_fetch_array($records))
				{
				?>
					<label class="text"><?php if($_SESSION['email'] == $data['email'] ) { echo $data['email'] ; } ?> </label>
				<?php
				}
			?>
			<?php mysqli_close($conn); // Close connection ?>
		</div>
	</header>
		<div class="top-banner"></div>
	<div class="cover">
	<div class="cpm">
    	<label for="browser">Choose Payment Method:</label>
    	<input list="browsers" name="payment_op" id="browser">
    	<datalist id="browsers">
      		<option value="Wallet">
      		<option value="Promtpay">
      		<option value="Bank"> 
    	</datalist>
	</div>
	
	<div class="bank">
    <label for="bro">Choose Mobile Banking:</label>
	<input list="bros" name="bank" id="bro">
    	<datalist id="bros">
      		<option value="SCB">
     		<option value="KBANK">
      		<option value="KTB">
      		<option value="BBL"> 
      		<option value="TMB">
      		<option value="UOB">
      		<option value="BAY">
      		<option value="TBANK">
      		<option value="CIMB"> 
      		<option value="LH">
    	</datalist>
	</div>
	<div class="name">
		<label for="fname">Bank Account Number:</label>
		<input type="text" id="fname" name="bank_number" ><br><br>
	</div>

	<div class="confirm">
		<input type="checkbox" name="ve" value="Boat" checked>
		<label for="ve"> Confirm Payment</label><br><br>
	<div class="submit">
		<input type="submit" name="accept" value="Submit">
	</div>
	</div>
	</div>
	</div>
</form>
</body>
</html>