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
<title>Web Designer</title>
<link rel="stylesheet" href="Webdesigner.css">
</head>
<body>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<input type="submit" class="home" name="home" id="submit" value="">
	</form>
	<div class="wrapper">
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
	<div class="page-wrapper">
		<header class="top-header">
			<div class="top-banner">
				<div id="logo">
				  <h1 data_temp_dwid="1">UXUI&nbsp; DESIGN</h1>
				</div>
			</div>
			<nav class="nav-bar">
				<ul>
					<li><a onclick="scrollWin(0,200)" >SAMJOSAMJOSAMJO</a></li>
					<li><a onclick="scrollWin(0,200)">DINOSAUR</a></li>
					<li><a onclick="scrollWin(0,400)">LUNA</a></li>
					<li><a onclick="scrollWin(0,400)">MAKRAM</a></li>
					<li><a onclick="scrollWin(0,1000)">HENDRIX</a></li>
				</ul>
			</nav>
		</header>
		<main class="main">
			<section class="feature-image">
				<div class="container-feature">
					<div class="Designer">
						<div id="pic1" class="designer-img"></div>
						<h2>PHURIN RUNGCHAT</h2>
						<p>Web Developer, Graduate from KMUTNB.<br>
							Work at Facebook Company.<br>
							Develop website facebook.</p>
					</div>
					<div class="Designer">
						<div id="pic2" class="designer-img"></div>
						<h2>PANITA KAEWSIDANG</h2>
						<p>Web Developer, Graduate from KMUTNB.<br>
							Work at Google Company.<br>
							Develop website google.</p>
					</div>
					<div class="Designer">
						<div id="pic3" class="designer-img"></div>
						<h2>SAWANYA VANICHAYAPORN</h2>
						<p>Web Developer, Graduate from KMUTNB.<br>
							Work at Apple Company.<br>
							Develop website Apple.</p>
					</div>
					<div class="Designer">
						<div id="pic4" class="designer-img"></div>
						<h2>CHAYANIN SUPAWANICH</h2>
						<p>Web Developer, Graduate from KMUTNB.<br>
							Work at Intel Company.<br>
							Develop website intel.</p>
					</div>
					<div class="Designer">
						<div id="pic5" class="designer-img"></div>
						<h2>NATTACHAI SUPAROJJANE</h2>
						<p>Web Developer, Graduate from KMUTNB.<br>
							Work at Microsoft Company.<br>
							Develop website microsoft.</p>
					</div>
				</div>
			</section>	
		</main>
	</div>
	<script>
		function scrollWin(a, b) {
  			window.scrollTo(a, b);
		}
	</script>
</body>
</html>
