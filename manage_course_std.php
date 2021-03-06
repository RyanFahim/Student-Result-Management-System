<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("location: student_login.php");
}

require_once "config.php";
$courseCode=$_GET['courseCode'];
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/design.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

    <title>PHP login system!</title>
  </head>
  <body>
  <style>
  .card{
    height: auto;
    width: auto;
    background: #BBBBBB;
    padding: 15px 15px 15px 15px;
    border: 2px solid #003049;
    margin-top: 20px;
  }
  </style>
  <nav class="navbar navbar-expand-lg " style="background-color: #B39CD0;" >
        <a class="navbar-brand" href="#" style ="color:white; font-family: 'Alfa Slab One', cursive;">Brooklyn  <span style ="font-style :italic; color: #4b4276;" >nine</span> nine</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" style ="color:white; font-family: 'Open Sans';" href="student_welcome.php"> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style ="color:white; font-family: 'Open Sans';" href="enroll_course.php">Enroll course</a>
            </li>
      
            <li class="nav-item">
              <a class="nav-link" style ="color:white; font-family: 'Open Sans';" href="my_courses.php">My course</a>
            </li>
          </ul>
          <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        <a class="nav-link" href="logout.php" style ="color:white; font-family: 'Alfa Slab One', cursive;"> <i class="fa fa-sign-out"></i> Logout</a>
      </li>
  </ul>
  </div>
          
      </nav>


<div class="container mt-4">
<h3><?php echo "Welcome ". $_SESSION['name'];?></h3>
<hr>

<br><br><br>
<h2>Result for <?php echo $courseCode; ?> Course</h2> <hr>
</div>
<div class="container">
<div class="row">
    <div class="col-md-7">
        <div class="card" id="invoice">
        <p>
            <?php 
                $username=$_SESSION['username'];
                $sql="SELECT * FROM main WHERE std_name='$username' and courseCode='$courseCode'";
                $result=mysqli_query($conn,$sql);
                $array=mysqli_fetch_array($result);
                echo '<b>MID EXAM (25): </b>'.$array['mid'].'<br>';
                echo '<b>Final EXAM (30): </b>'.$array['final'].'<br>';
                echo '<b>Presentation (10): </b>'.$array['presentation'].'<br>';
                echo '<b>Assignment(20): </b>'.$array['assignment'].'<br>';
                echo '<b>Quiz (15): </b>'.$array['quiz'].'<br>';
                echo '<br> <br>';
                echo '<b>Total Marks Obtained: </b>'.$array['total'].'<br>';
                echo '<b>Grade: </b>'.$array['grade'].'<br>';
                echo '<br>';
            ?>
            </p>
        
          
        </div>
        <br>
        <div style="text-align: center; "><button class="btn btn-primary" style="background-color: #8b63bb;"  id="download" >Download your result</button> </div>
    </div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        window.onload = function () {
      document.getElementById("download")
          .addEventListener("click", () => {
              const invoice = this.document.getElementById("invoice");
              console.log(invoice);
              console.log(window);
              var opt = {
                margin: 1,
                filename: 'result.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
          })
  }
    </script>
  </body>
</html>

