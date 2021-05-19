<?php
	
	include("connection.php");

	if (isset($_POST['sign_out'])){
		session_destroy();
		header("Location: index.php");
	}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home Page</title>
<link rel="stylesheet" href="Menuscreen.css">
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <div class="wrapper">
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
			<?php mysqli_close($conn);  ?>
		</div>
	  <div class="top-banner"></div>
		
		<ul class="menu">
			<li><a href="Webdesigner.php">WEB DESIGHNER</a></li>
			<li><a href="Create_Order.php">CREATE ORDER</a></li>
			<li><a href="status.php">CHECK STATUS</a></li>
			<li><input type="submit" class="button" name="sign_out" value="Sign Out"></input></li>
		</ul>
		<ul class="top-banner"></ul>
  </div>
</form>
</body>
</html>
