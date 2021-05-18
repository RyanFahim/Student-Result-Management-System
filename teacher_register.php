<?php
require_once "config.php";



if ($_SERVER['REQUEST_METHOD'] == "POST"){

  $name=$_POST['name'];
  $username= $_POST['username'];
  $password= $_POST['password'];
  $c_pass= $_POST['confirm_password'];
  $check_pass=md5($password);
  $sql1="SELECT * FROM users WHERE username='$username'";
  $result1=mysqli_query($conn,$sql1);
  $count=mysqli_num_rows($result1);
  if($count>0){
    $msg="Username has already registered in the system";
  }
  else{
    if($password!=$c_pass)
    {
      $msg="Password and Confirm Password do not match!";
    }
    else{
      $insert="INSERT INTO teachers(name, username, password) VALUES('$name','$username', '$check_pass')";
      $result2=mysqli_query($conn,$insert);
      if($result2)
      {
        $_SESSION['name']=$name;
        $_SESSION['username']=$username;
        header('location: teacher_login.php');
      }
    }
  }
  

}
else{
  
}



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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Brooklyn Nine-Nine!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php"> <span style="font-style :italic;">Brooklyn nine nine! </span> </a>

  </nav>




 <div class="container-fluid mt-4">

  <div class="row">

    <div class="col-5">
      <img class="card-img-top" src="images\teacher.svg" alt="Card image cap">
    </div>

    <div class="col-6">

      <div class="container mt-4">
        <h3>Please Register Here as a teacher:</h3>
        <hr>
        <form action="" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputName">Name</label>
              <input type="name" class="form-control" name="name" id="inputName" placeholder="Enter you Name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" name="username" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Password</label>
              <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword4">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" id="inputPassword"
              placeholder="Confirm Password">
          </div>
    
          <button type="submit" class="btn btn-primary">Sign in</button>
    
      </div>
    </div>
  </div>
 </div>
 






  </form>
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