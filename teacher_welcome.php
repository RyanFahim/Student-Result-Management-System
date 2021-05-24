<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("location: teacher_login.php");
}

require_once "config.php";
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- google font -->

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap"
    rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/design.css">

  <title>PHP login system!</title>
</head>

<style>
  .card {
    height: 150px;
    width: auto;
    background: #BBBBBB;
    padding: 15px 15px 15px 15px;
    border: 2px solid #003049;
    text-align: center;
    margin-top: 20px;
  }

  .card:hover {
    box-shadow: 0px 0px 20px 2px;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#" style ="color:white; font-family: 'Alfa Slab One', cursive;">Brooklyn  <span style ="font-style :italic; color: #4b4276;" >nine</span> nine</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="navbar-collapse collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        <a class="nav-link" href="logout.php" style ="color:white; font-family: 'Alfa Slab One', cursive;"> <i class="fa fa-sign-out"></i> Logout</a>
        </li>
      </ul>
  </nav>
  </div>


  <div class="container mt-4">
    <h3>
      <?php echo "Welcome ". $_SESSION['name'];?>! You can now use this website
    </h3>
    <hr>

    <br><br><br>
    <h2>My Courses</h2>
    <hr>
  </div>
  <div class="container">
    <div class="row">

      <?php
$username=$_SESSION['username'];
$sql = "SELECT * FROM info WHERE teacher='$username'";
$result = mysqli_query($conn, $sql);
$count= mysqli_num_rows($result);
$c="";
if($result){
  if(mysqli_num_rows($result)>0){
    while($rows = mysqli_fetch_array($result)){
      ?>
      <div class="col-md-4">
        <a href="manage_course.php?course=<?php echo $rows['course'];?>" id="course">
          <div class="card">
            <?php
            echo '<h3>' .$rows['courseName']. '</h3>';
            echo '<h5>' .$rows['course']. '</h5>';        
          ?>
          </div>

        </a>
      </div>
      <?php
    }
  }
}

?>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>