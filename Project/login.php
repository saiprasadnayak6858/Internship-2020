<?php
    session_start();
    require './dbconfig/config.php';
    if(isset($_POST['login_btn']))
    {
        // echo '<script type="text/javascript> alert("login button clicked");</script>';
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "select * from user where username ='$username' and password ='$password'";

        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run)>0)
        {
            $_SESSION['username'] = $username;
            $_SESSION['isAdmin'] = true;
            header('location:home.php?success=login');

        }
        else{
           
            header("Location:index.php?error=login");
        }
    }
?>