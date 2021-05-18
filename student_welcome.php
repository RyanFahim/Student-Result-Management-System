<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("location: student_login.php");
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Student Home</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg" style="background-color: #B39CD0;">
  <a class="navbar-brand" href="index.php" style ="color:white; font-family: 'Alfa Slab One', cursive;">Brooklyn <span style ="font-style :italic; color: #4b4276;" >nine</span> nine! </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="my_courses.php" style ="color:white;">My courses <span class="sr-only">(current)</span></a>
        </li>

      
      </ul>
     

      <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        <a class="nav-link" href="logout.php" style ="color:white;"> <i class="fa fa-sign-out"></i> Logout</a>
      </li>
  </ul>
  </div>
  </nav>
<div class="container mt-4">
<h3><?php echo "Welcome ". $_SESSION['name']?>!</h3>

<hr>

<br><br>

</div>

<div class="container">
  <div class="row">
    <div class="col-md-6" style="text-align:center;">
    <a href="enroll_course.php">
      <img src="images/enroll_course.png" alt="" height="300px" class="img-responsive">
      <h2>Enroll Courses</h2>
    </a>  
    </div>
    <div class="col-md-6" style="text-align:center;">
    <a href="my_courses.php">
      <img src="images/my_courses.png" alt="" height="300px" class="img-responsive">
      <h2>My Courses</h2>
    </a> 
    </div>
  </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

