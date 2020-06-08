<?php 
   session_start();
   if(!isset($_SESSION['username'])){
     header("location:home.php");
    }
    error_reporting(0);
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
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  </head>
  <body>
  <form id="dtform"  method="POST">
    <div class="container date">
        <div class="row form-group">
        <label>Select Date: </label>
        <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
            <input class="form-control" id="date"  name="date" type="text" readonly />
            <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
        </div>
    </div>
    <input type="submit" name="submit_date" id="submit-date" class="btn btn-primary px-5"></input>
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
            echo  '<td class="pabuttons" id="' . $row['Registration_Number'] . '" hidden></td>';
            // echo '<td><button hidden class="btn btn-primary present-btn" name="present-btn">Present</button><button class="btn btn-primary mx-5 absent-btn"  name="absent-btn">Absent</button></td>';
            echo '</tr>';
        }
          ?>
        </tbody>
      </table>
    </div>
    </div>
     
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">

    $(function () {
    $("#datepicker").datepicker({ 
          autoclose: true, 
          todayHighlight: true
    }).datepicker('update', new Date());

    let tableDetails = false;
    $('#submit-date').click(function(e) {
   
      const date = document.getElementById('date').value;
     
      e.preventDefault();
      $.post("table.php",$("#dtform").serialize() , function(data){
             console.log(data);
         },'json');
      if(tableDetails === false)
      {
        $(".pabuttons").removeAttr("hidden");
      $('.pabuttons').html('<button class="btn btn-primary present-btn" name="present-btn">Present</button>' + '<button class="btn btn-primary mx-5 absent-btn"  name="absent-btn">Absent</button>');
      // $('.table-row').append('<form action="table.php" method="POST">' + '<center>' + '<button type="submit" name="submit-attendance" id="submit-attendance" class="btn btn-primary mb-5 px-4">Submit</button>' + '</center>' + '</form>');
      $('.present-btn, .absent-btn').click(attendance);
      $('#table thead tr').append('<th>' + date + '</th>');
        tableDetails = true
      }
      else{
        $('#table thead tr th:last-child').text(date);        
      }
     }) 
  })
function attendance ()
     {
      if($(this).hasClass('present-btn'))
      { 
        $.post("table.php",{reg:$(this).parent().attr('id'),done:"P"} , function(data){
             console.log(data);
         },'json');
        $(this).removeClass('btn-primary').addClass('btn-success');
        $(this).siblings().addClass('btn-primary').removeClass('btn-danger');
      }
      else
      {   
        $.post("table.php",{reg:$(this).parent().attr('id'),done:"A"} , function(data){
             console.log(data);
         },'json');
        $(this).removeClass('btn-primary').addClass('btn-danger');
        $(this).siblings().addClass('btn-primary').removeClass('btn-success');
      }
     }

  </script>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){ 
  error_log(print_r($_POST,true), 3, "my-errors.log"); 

  if(!empty($_POST['date'])){         
     $date = $_POST['date'];
    $date = str_replace("-", "_", $date);
    $_SESSION['date']=$date;
    error_log($date,3, "my-errors.log");
    $dquery="ALTER TABLE class ADD $date VARCHAR(30)";
    error_log($dquery,3, "my-errors.log");
	$duplicate_result=mysqli_query($con_class,$dquery) or die(mysqli_error($con_class));
  }
  if(!empty($_POST['reg'])){
    error_log(print_r($_POST,true), 3, "my-errors.log"); 

    $reg=$_POST['reg'];
    $act=$_POST['done'];
    $date= $_SESSION['date'];
    error_log( $_SESSION['date'] ,3,"my-errors.log");
    $query="UPDATE class SET $date = '$act' WHERE Registration_Number = $reg";
    error_log($query,3,"my-errors.log");
    $dresult=mysqli_query($con_class,$query) or die(mysqli_error($con_class));

  }
 
}
?>
  </body>
</html>