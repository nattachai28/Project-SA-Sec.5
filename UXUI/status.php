<?php
	include("connection.php");

	if (isset($_POST['home'])){
		header("Location: Menuscreen.php");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project Status</title>
	<link rel="stylesheet" href="status.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	  <input type="submit" class="home" name="home" id="submit" value="">
	</form>
	<div class="top-header">
			<?php
				include "connection.php"; require "login.php";
				$records = mysqli_query($conn,"select email from user");
				while($data = mysqli_fetch_array($records))
				{
				?>
					<label class="text"><?php if($_SESSION['email'] == $data['email'] ) { echo $data['email'] ; } ?> </label>
				<?php
				}
			?>
			<?php mysqli_close($conn);?>
		</div>
	<header class="top-header">
	</header>
		<div class="top-banner"></div>
	<div class="progress">
	<ul>
		<li>
			<img src="Credit.png"><br>
			<i class="far fa-check-circle"></i>
			<p>Make Payment</p>
		</li>
		<li>
			<img src="designing.png"><br>
			<i class="far fa-check-circle"></i>
			<p>Designing</p>
		</li>
		<li>
			<img src="building.png"><br>
			<i class="far fa-check-circle"></i>
			<p>Building the web</p>
		</li>
		<li>
			<img src="checking.png"><br>
			<i class="far fa-check-circle"></i>
			<p>Checking for completeness</p>
			
		</li>
	  <li>
			<img src="complete.png"><br>
			<i class="far fa-check-circle"></i>
			<p>Completed</p>
			
		</li>
      <div class="footer">
	      <?php
				include "connection.php"; require "createy.php";
		  		$email = $_SESSION['email'];
		  		$query = "SELECT * FROM createorder WHERE email = '$email' ";
				$records = mysqli_query($conn, $query);
				while($data = mysqli_fetch_array($records))
				{
				?>
		  <label class="text">Web Developer : <?php echo $data['Web_Developper'] ;  ?></label>
	      <label class="text">Detail : <?php echo $data['Detail'] ;  ?></label>
	      <?php
				}
			?>
	      <?php mysqli_close($conn);?>
      </div>
	</ul>
	</div>
</body>
   </html>