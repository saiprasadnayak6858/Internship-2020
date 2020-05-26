<?php 
   session_start();
   if(!isset($_SESSION['username'])){
    header("location:home.php");
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
    <link rel="stylesheet" type="text/css" href="./style.css">
     <!--Fontawesomoe-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
    <title>Table</title>
    <style>
      <?php include './style.css'; ?>
      </style>
  </head>
  <body>
  <form action="/FORM/table.php" method="POST">
    <div class="container date">
        <div class="row form-group">
        <label>Select Date: </label>
        <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
            <input class="form-control" name="date" type="text" readonly />
            <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
        </div>
    </div>
    <button type="submit" name="submit-date" class="btn btn-primary px-5">Submit</button>
    </div>
    </form>
    
    <!--Table-->
    <div class="container table-row">
        <div class="row">
        <table class="table table-bordered">
        <thead class="thead-dark">
          <tr class="text-center">
            <th scope="col">Registration Number</th>
            <th scope="col">Full Name </th>
            <th scope="col"><?php
     if(isset($_POST['submit-date']))
        $date = $_POST['date'];
        if(isset($date)){
        echo $date;
        }
        else{
          echo 'Date';
        } 
    ?> 
    </th>
          </tr>
        </thead>
        <tbody>
        <?php 
       
        while($row = mysqli_fetch_array($result))
        { 
          echo '<tr class="text-center">';
           echo  '<td scope="row">' . $row['Registration_Number'] . '</td>';
            echo '<td>' . $row['Full_Name'] . '</td>';
            echo  '<td><button class="btn btn-primary present-btn" name="present-btn">Present</button><button class="btn btn-primary mx-5 absent-btn"  name="absent-btn">Absent</button></td>';
            echo '</tr>';
        }
          ?>
        </tbody>
      </table>
    </div>
    </div>
     
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></?>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
    $(function () {
    $("#datepicker").datepicker({ 
          autoclose: true, 
          todayHighlight: true
    }).datepicker('update', new Date());
    });

    $('.present-btn, .absent-btn').click(
     function ()
     {
      if($(this).hasClass('present-btn'))
      {
        $(this).removeClass('btn-primary').addClass('btn-success');
        $(this).siblings().addClass('btn-primary').removeClass('btn-danger');
      }
      else
      {   
        $(this).removeClass('btn-primary').addClass('btn-danger');
        $(this).siblings().addClass('btn-primary').removeClass('btn-success')
      }
     }
     
);
  
  </script>
  </body>
</html>