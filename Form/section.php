<?php 
   session_start();
   if(!isset($_SESSION['username'])){
    echo "<p>Please Log In First</p>";
    header( "refresh:3; url=index.html" ); 
   }
   ?>
<!DOCTYPE html>

 <html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Button</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="./style.css">
        <!--Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
        <!--Fontawesomoe-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
    </head>
  <style>
    *, *:before, *:after {
    box-sizing: border-box;
  }
  body {
    background: rgb(240, 223, 223);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-family: 'Noto Sans', sans-serif;
  }

  i{
      margin-right:6px;
  }
  
  a {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    text-decoration: none;
    cursor: pointer;
    border: 1px solid #6C63FF;
    border-radius: 10px;
    height: 2.8em;
    width: 16rem;
    outline: none;
    overflow: hidden;
    color: #6C63FF;
    -webkit-transition: color 0.3s 0.1s ease-out;
    transition: color 0.3s 0.1s ease-out;
    text-align: center;
    line-height: 250%;
  }
  a::before {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    content: '';
    border-radius: 50%;
    display: block;
    width: 25rem;
    height: 20em;
    line-height: 20em;
    left: -5em;
    text-align: center;
    -webkit-transition: box-shadow 0.5s ease-out;
    transition: box-shadow 0.5s ease-out;
    z-index: -1;
  }
  a:hover {
    color: #fff;
  }
  a:hover::before {
    box-shadow: inset 0 0 0 10em #6C63FF;
  }
  .btn-it{
    position: absolute;
    margin-left:28rem;
  }
  .btn-cse{
    position: absolute;
    margin-left:50rem;
  }
  @media (max-width:768px){
    .btn-it{
    position: relative;
    margin-top:28rem;
  }
  .btn-cse{
    position: absolute;
    margin-top:50rem;
  }
  }
    </style>
    <body>
    <div class="container">
      <a href="./table.php" target="_blank" class="btn-cse"> <i class="fa fa-github"></i>Computer Engineering</a>
      <a href="./table.php" target="_blank" class="btn-it"> <i class="fa fa-github"></i>Information Technology</a>
      </div>
    </body>
</html>
