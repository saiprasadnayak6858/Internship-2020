<?php 
   session_start();
   error_reporting(E_PARSE);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--Custom CSS -->
    <link rel="stylesheet" href="./style.css">

    <title>Login Successful!</title>
  </head>
  
  <body>

    <div class="loginWrapper">
        <div class="logincard bg-white">
           <div class="row">
              <div class="col-lg-6 col-12">
                 <div class="leftbox">
                    <div class="circle"></div>
                    <div class="leftboxContent">
                       <img src="./images/banner.png" class="bgimg" alt="flower image">
                      
                    </div>
                  </div>
              </div>
              <div class="col-lg-6 col-12">
                 <div class="rightbox text-center">
  
                    <img src="./images/undraw_profile_pic_ic5t.png" class="rounded-circle" alt="profile image">
                    <p>Hello <?php 
                        echo $_SESSION['username'];
                    ?></p>
                    <form action="home.php" method="POST">
                      
                      
                       <?php
                       if($_SESSION['isAdmin']){
                        echo '<button type="submit" name="logout_btn" class="btn btn-primary mt-5">Logout</button>';
                        echo '<button type="submit" name="access_btn" class="btn btn-primary mt-5">Show My Classes</button>';
                       }
                        else{
                           echo '<button type="submit" name="login_btn" class="btn btn-primary mt-5">Login to View Your Class</button>';
                        }
                     ?>
                    </form>
                 </div>
              </div>
           </div>
        </div>
     
  
     </div>
   <?php
   if(isset($_POST['logout_btn']))
   {
      session_destroy();
      header('location:index.php');
   }
   if(isset($_POST['access_btn']))
   {
          header('location:section.php');
   }
   if(isset($_POST['login_btn']))
   {
          header('location:index.php');
   }


   ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

   </body>
</html>
