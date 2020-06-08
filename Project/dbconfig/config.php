<?php
    //Connection for getting users
    $con = mysqli_connect("localhost","root","") or die("Could not connect");
    mysqli_select_db($con,"users");

    //Connection for getting students of class
    $con_class = mysqli_connect("localhost","root","") or die("Could not connect");
    mysqli_select_db($con_class,"class");
?>