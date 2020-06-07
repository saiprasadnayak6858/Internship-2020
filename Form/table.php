<?php 
   session_start();
   if(!isset($_SESSION['username'])){
     header("location:home.php");
    }
    error_reporting(0)
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
  <form action="table.php" method="POST">
    <div class="container date">
        <div class="row form-group">
        <label>Select Date: </label>
        <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
            <input class="form-control" id="date"  name="date" type="text" readonly />
            <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
        </div>
    </div>
    <button type="submit" name="submit_date" id="submit-date" class="btn btn-primary px-5">Submit</button>
    </div>
    </form>
    
    <!--Table-->
    <div class="container table-row">
        <div class="row">
        <table class="table table-bordered" id="table">
        <thead class="thead-dark">
          <tr class="text-center">
            <th scope="col">Registration Number</th>
            <th scope="col">Full Name </th>
    
          </tr>
        </thead>
        <tbody>
        <?php 
       
        while($row = mysqli_fetch_array($result))
        { 
          echo '<tr class="text-center">';
           echo  '<td scope="row">' . $row['Registration_Number'] . '</td>';
            echo '<td>' . $row['Full_Name'] . '</td>';
            // echo  '<td><button class="btn btn-primary present-btn" name="present-btn">Present</button><button class="btn btn-primary mx-5 absent-btn"  name="absent-btn">Absent</button></td>';
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

    // $('#submit-date').click(function() {
    // $('#table tr').append($('<>'))
    // $('#table thead tr>td:last').html($('$date');
    // $('#table tbody tr').append($('<td><button class="btn btn-primary present-btn" name="present-btn">Present</button><button class="btn btn-primary mx-5 absent-btn"  name="absent-btn">Absent</button></td>'));
    let tableDetails = false;

    $('#submit-date').click(function(e) {
      e.preventDefault();
      const date = document.getElementById('date').value;
      if(tableDetails === false)
      {
      $('tbody tr').append('<td>' + '<button class="btn btn-primary present-btn" name="present-btn">Present</button>' + '<button class="btn btn-primary mx-5 absent-btn"  name="absent-btn">Absent</button>' + '</td>');
      $('.table-row').append('<form action="table.php" method="POST">' + '<center>' + '<button type="submit" name="submit-attendance" id="submit-attendance" class="btn btn-primary mb-5 px-4">Submit</button>' + '</center>' + '</form>');
      $('.present-btn, .absent-btn').click(attendance);
      $('#table thead tr').append('<th>' + date + '</th>');
        tableDetails = true
      }
      else{
        $('#table thead tr th:last-child').text(date);        
      }
      //  $(this).attr('disabled', true)
     }) 
  })
function attendance ()
     {
      if($(this).hasClass('present-btn'))
      {
        $(this).removeClass('btn-primary').addClass('btn-success');
        $(this).siblings().addClass('btn-primary').removeClass('btn-danger');
      }
      else
      {   
        $(this).removeClass('btn-primary').addClass('btn-danger');
        $(this).siblings().addClass('btn-primary').removeClass('btn-success');
      }
     }
   
  </script>
<?php
// if(isset($_POST['submit-date'])){
//   $date = $_POST['date'];
// }
// mysqli_query($con_class,"ALTER TABLE class ADD  date VARCHAR(255) NOT NULL");
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if($_POST['submit_date']){
    $date = $_POST['date'];
    $date = str_replace("-", "_", $date);
    $_SESSION['date']=$date;
    mysqli_query($con_class,"ALTER TABLE class ADD $date VARCHAR(25)");
  }
}
?>
  </body>
</html>