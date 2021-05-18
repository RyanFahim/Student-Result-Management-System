<?php

//handle login for student

session_start();


if(isset($_SESSION['username'])){
    header("location: admin_welcome.php");
    exit;
}
require_once "config.php";


if($_SERVER['REQUEST_METHOD'] == "POST"){
   $username=$_POST['username'];
   $pass=$_POST['password'];
   $check_pass=md5($pass);
   $sql="SELECT * FROM admin WHERE username='$username' and password='$check_pass'";
   $result=mysqli_query($conn,$sql);
   $count=mysqli_num_rows($result);
   
   if($count==1)
   {
    $ans=mysqli_fetch_array($result);
     $_SESSION['username']=$username;
     //$_SESSION['name']= $ans['name'];
     header('location: admin_welcome.php');
   }
   else{
     $msg="Wrong Password or Username";
   }
}


?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/design.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>B99!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php"> <span style="font-style :italic;">Brooklyn nine nine! </span> </a>

  </nav>



  </ul>
  </div>
  </nav>



  <div class="row mt-4">

    <div class="container col-6">
      <img src="images\admin.svg" alt="">
    </div>

    <div class="col-5">

      <div class="container mt-4">

        <h3>Admin, please Login Here:</h3>
        <hr>

        <form action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
              placeholder="Enter Password">
          </div>

          <button type="submit" class="btn btn-success">Submit</button>
        </form>



      </div>

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