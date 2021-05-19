<?php 

    session_start();

    if (isset($_POST['submit'])) {

        require('connection.php');

        $email = $_POST['email'];
        $password = $_POST['password'];
        //$passwordenc = md5($password);

        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);
    
            $_SESSION['userid'] = $row['id'];
            $_SESSION['user'] = $row['firstname'] . " " . $row['lastname'];
            $_SESSION['email'] = $row['email'];
    
            header("Location: Menuscreen.php");
    
        } 
    
        else {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Email or Password are wrong');
                window.location.href='index.php';
            </script>");
        }

    } 
    else if (isset($_POST['register'])){
        header("Location: Register.php");
    }

?>