<?php
    $con = mysqli_connect("localhost","root","") or die("Could not connect");
    mysqli_select_db($con,"users");
    $con_class = mysqli_connect("localhost","root","") or die("Could not connect");
    mysqli_select_db($con_class,"class");
?>