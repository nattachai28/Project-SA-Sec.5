<?php

    include("connection.php");

	if(isset($_POST['button'])){

		require_once "login.php";

		$email = $_SESSION['email'];
		$web_developer = $_POST['select'];
		$detail = $_POST['detail'];
		
		$query = "INSERT INTO createorder (email, Web_Developper, Detail)
					VALUE ('$email', '$web_developer', '$detail')";
		$result = mysqli_query($conn, $query);
		
		$query_1 = "SELECT * FROM createorder WHERE email = '$email'";

        $result_1 = mysqli_query($conn, $query_1);



            $row = mysqli_fetch_array($result_1);
    
            $_SESSION['webdev'] = $row['Web_Developper'];
            $_SESSION['detail'] = $row['Detail'];

		if ($result) {
			echo ("<script LANGUAGE='JavaScript'>
                window.alert('Succesfully');
                window.location.href='pay.php';
            </script>");
		} else {
			echo ("<script LANGUAGE='JavaScript'>
                window.alert('Already send detail');
                window.location.href='Menuscreen.php';
            </script>");
		}
	}
	else if (isset($_POST['home'])){
		header("Location: Menuscreen.php");
	}
?>