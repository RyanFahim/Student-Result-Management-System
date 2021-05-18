<?php
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/index.css">

  <!-- google font -->

  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>B99!</title>
</head>
<style>
  #body{
    padding: 70px;
  }
  .span {
        
        font-style: italic;
      }

      .banner{
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)), url('images/1.jpg');
    background-size: cover;
    background-position: center;
}

div.content{
  width:100%;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  text-align: center;
  
  /* font-family: 'Open Sans', sans-serif; */
  
}

 .navbar ul li a{
   color:white;
 }
.content h1{
  color: white;
  font-family: 'Alfa Slab One', cursive;
  font-size: 100px;
}

.content p{
  margin: 20px auto;
  font-weight: 100;
  line-height:25px;
  color: white;
  tyext-align:center;
}
/* .content p{
  width: 200px;
  padding: 15px 0;
  /* text-align: center; */
  /* margin:20px 10px;
  border-radius:25px;
  background:transparent;
  color:white;
  cursor:pointer;
} */ */

</style>


<body>

<div class="banner">
  <nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand " style = "color:white; font-family: 'Alfa Slab One', cursive; " href="index.php">Brooklyn <span style ="font-style :italic; color: #4b4276;" >nine</span> nine! </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            User Option
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a class="dropdown-item" style= "color:#000000;" href="teacher_register.php">Teacher Register</a>
            <a class="dropdown-item" style= "color:#000000;" href="teacher_login.php">Teacher logIn</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" style= "color:#000000;" href="student_register.php">Student Register</a>
            <a class="dropdown-item" style= "color:#000000;" href="student_login.php">Student logIn</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_login.php">Admin Login</a>
        </li>
      </ul>

  </nav>
  <!-- https://source.unsplash.com/1600x600/?nature,water -->

  

    <!-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="\Student_result\images\d.jpg" alt="First slide">
        </div>

      </div>
    </div> -->
    
     <div class="content mt-4 ;"  > 
       
      <h1>Broklynn <span style ="font-style :italic; color: #4b4276;" >NINE</span> nine</h1> 
      <p>
      “Knowledge can be borrowed, but you can’t borrow understanding. Once you reach a conclusion derived from your thinking, it is called a realisation. And once you realise something, your perception changes about it once and for all. And that perception remains locked down until another realisation impacts it—that’s the process of learning and growing.”
      </p>
       
      
       
         
         
        
       
       </ <hr>
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