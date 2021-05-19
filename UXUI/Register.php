<?php 

    session_start();
	
	require_once "connection.php";

	$errors = array();

	if(isset($_POST['return'])){
		header("Location: index.php");
	}

    else if (isset($_POST['submit'])) {

        $email = mysqli_real_escape_string($conn,$_POST['email']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$check_password = mysqli_real_escape_string($conn,$_POST['confirmpass']);
        $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);

		if ( empty($email) or empty($password) or empty($check_password) or empty($firstname) or empty($lastname) ){
			array_push($errors,"Fill all empty space");
		}

        $user_check = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
		$user = mysqli_fetch_assoc($result);
		
		/*if (isset($username) or isset($password) or $isset($firstname) or isset($lastname)){
			echo "<script>alert('Fill all space');</script>";
		} */
		error_reporting(E_ALL ^ E_WARNING); 
		if ($user['email'] === $email) {
            echo "<script>alert('Email already exists');</script>";
		} 
		else if (count($errors) == 0) {
            //$passwordenc = md5($password);

            $query = "INSERT INTO user (email, password, firstname, lastname, phone)
                        VALUE ('$email', '$password', '$firstname', '$lastname', '$phone')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: index.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: index.php");
            }
		}
		else{
			echo "<script>alert('Please Fill all empty space');</script>";
		}			
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
	*{
		margin:0;
		padding:0;
	}
	body{
		background-image:url(Dark.png);
		background-position:center;
		background-size:cover;
		font-family:sans-serif;
		margin-top:40px;
	}
	.regform{
		width:800px;
		background-color:rgb(0,0,0,6);
		margin:auto;
		color:#FFFFFF;
		padding:10px 0px 10px 0px;
		text-align:center;
		border-radius:15px 15px 0px 0px;
		}
	.main{
		background-color:rgb(0,0,0,0,5);
		width:800px;
		margin:auto;
		}
		form{
			padding::10px;
		}
	#name{
		width:100%;
		height:100px;
		}
	
	.name{
		margin-left:25px;
		margin-top:30px;
		width:125px;
		color:white;
		font-size:18px;
		font-weight:700;
		}
	.firstname{
		position:relative;
		left:200px;
		top:-18px;
		line-height:40px;
		border-radius:6px;
		padding:0 22px;
		font-size:16px;
		}
	.lastname{
		position:relative;
		left:500px;
		top:-61px;
		line-height:40px;
		border-radius:6px;
		padding:0 22px;
		font-size:16px;
		}
	.firstlabel{
		position: relative;
		color:black;
		text-transform: capitalize;
		font-size: 14px;
		left: 200px;
		top:-25px;
	}
	.lastlabel{
		position: relative;
		color:black;
		text-transform: capitalize;
		font-size: 14px;
		left: 170px;
		top:-25px;
	}
	.email{
		position: relative;
		left:200px;
		top: -37px;
		line-height: 40px;
		width: 532px;
		border-radius: 6px;
		padding: 0 22px;
		font-size: 16px;

	}
	.phone{
		position: relative;
		left:200px;
		top: -37px;
		line-height: 40px;
		width: 255px;
		border-radius: 6px;
		padding: 0 22px;
		font-size: 16px;
	}
	.password{
	position: relative;
		left:200px;
		top: -37px;
		line-height: 40px;
		width: 532px;
		border-radius: 6px;
		padding: 0 22px;
		font-size: 16px;
	}
	.confirmpassword{
		position: relative;
		left:200px;
		top: -37px;
		line-height: 40px;
		width: 532px;
		border-radius: 6px;
		padding: 0 22px;
		font-size: 16px;
	}
	.button1{
		background-color: #D5AE3E;
		display: block;
		margin: 20px 0px 0px 20px;
		text-align: center;
		border-radius: 12px;
		border: 2px #000000;
		padding:14px 110px;
		outline: none;
		cursor: pointer;
		transition: 0.25px;
	}
	
	button:hover{
		background-color: #5390f5;
	}

</style>
</head>    
<body>
	
	<div class = "regform"><h1>Registation Form</h1></div>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
        <div id = "name">
        	<h2 class="name">Name</h2>
            <input class ="firstname" placeholder="Firstname" type="text" name ="firstname"><br>
          <!--<label class = "firstlabel">first name</label>-->
            <input class ="lastname" placeholder="Lastname" type="text" name ="lastname">
            <!--<label class ="lastlabel">last name</label>-->
		</div>
            
            <h2 class = "name">Email</h2>
            <input class="email" type="email" name="email">
            
			<h2 class ="name">Phone</h2>
			<input class="phone" type="tel" name="phone">
			
			<h2 class="name">Password</h2>
			<input class="password" type="password" name="password">
			
			 <h2 class = "name">ConfirmPassword</h2>
			<input class="confirmpassword" type="password" name="confirmpass">
			
			<button class="button1" type="submit" name="submit">Submit</button>
			<button class="button1" type="submit" name="return">Return to Login</button>
	</form>
				  
</body>
</html>
