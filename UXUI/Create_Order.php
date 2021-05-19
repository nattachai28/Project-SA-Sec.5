<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home Page</title>
<link rel="stylesheet" href="createorder.css">
</head>
<body>
<form action="createy.php" method="POST">
<input type="submit" name="button" class="submit" id="submit" value="Submit">
<input type="submit" class="home" name="home" value="">
	<div class="top-header">
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
		<div class="head">Creat Order</div>
			<div class="select">
			<label for="select">Select Your Web Developer : </label>
			<select class="box" name="select" id="select" value="select">
				<option value="Chayanin Supawanich">Chayanin Supawanich</option>
				<option value="Nattachai Supharojanee">Nattachai Supharojanee</option>
				<option value="Phurin Rungchat">Phurin Rungchat</option>
				<option value="Panita Kaewsidang">Panita Kaewsidang</option>
				<option value="SAWANYA VANICHAYAPORN">Sawanya Vanichayaporn</option>
			</select>
			</div>
			<div class="detail"><label class="text" for="textarea">Detail :</label></div>
			<textarea class="datafield" name="detail" id="textarea"></textarea>
</form>
</body>
</html>
