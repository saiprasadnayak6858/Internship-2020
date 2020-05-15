<?php 
   session_start();
   if(!isset($_SESSION['username'])){
    header("location:index.html");
   }
   ?>
   <?php
    require './dbconfig/config.php';
    $result = mysqli_query($con_class,"SELECT * FROM class");
   ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Bootstrap datePicker-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <!--Custom CSS -->
    <link rel="stylesheet" href="./style.css">
     <!--Fontawesomoe-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
    <title>Table</title>
    <style>
        .table-row{
            margin-top:10rem;
        }
    </style>
  </head>
  <body>
    
    <!--Table-->
    <div class="container table-row">
        <div class="row">
        <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Registration Number</th>
            <th scope="col">Full Name</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        while($row = mysqli_fetch_array($result))
        {
          echo '<tr>';
           echo  '<th scope="row">' . $row['Registration_Number'] . '</th>';
            echo '<td>' . $row['Full_Name'] . '</td>';
         echo '</tr>';
        }
          ?>
        </tbody>
      </table>
    </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="./script.js"></script>
  </body>
</html>