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

    <title>Login Form</title>
  </head>
  
  <body>
     <?php
  $err = filter_input(INPUT_GET, 'error');
 if ($err === "login")
  echo "<script>alert('Invalid Login Credentials!');</script>";
?>
    <div class="loginWrapper">
        <div class="logincard bg-white">
           <div class="row">
              <div class="col-lg-6 col-12">
                 <div class="leftbox">
                    <div class="circle"></div>
                    <div class="leftboxContent">
                       <img src="./images/banner.png" class="bgimg" alt="banner-img">
                      
                    </div>
                  </div>
              </div>
              <div class="col-lg-6 col-12">
                 <div class="rightbox text-center">
  
                    <img src="./images/undraw_profile_pic_ic5t.png" class="rounded-circle" alt="profile image">
                    <p>Login below to get started !</p>
                    <!--Login Form-->
                    <form action="login.php" method="POST">
                       <input autocomplete="off" type="text" name="username"  class="form-control" placeholder="Username"
                          aria-describedby="prefixId" required>
  
  
                       <input autocomplete="off" type="password" name="password" class="form-control" placeholder="Password"
                          aria-describedby="prefixId" required>
  
                       <p class="d-flex align-items-center pl-4"><input type="checkbox" name="" id="abc" class="mr-2" checked> <label for="abc"></label> Keep
                          me logged in</p>
                       <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                      
                    </form>
  
  
                 </div>
              </div>
           </div>
        </div>
     
  
     </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
   </body>
</html>