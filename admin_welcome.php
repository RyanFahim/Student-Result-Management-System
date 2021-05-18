<?php

// INSERT INTO `info` (`sno`, `teacher`, `student`, `course`, `exam`, `quiz`, `assignment`, `total`) VALUES (NULL, 'spen', 'null', 'microbiology', '0', '0', '0', '0');
session_start();

if(!isset($_SESSION['username']))
{
    header("location: admin_login.php");
}

require_once 'config.php';
$insert = false;
$delete = false;



if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `info` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $teachers = $_POST["teachers"];
  $student = $_POST["student"];
  $course = $_POST["course"];
  $extract= "SELECT * FROM course WHERE courseCode='$course'";
  $ext_res= mysqli_query($conn,$extract);
  $ans_ext=mysqli_fetch_array($ext_res);
  $courseName=$ans_ext['courseName'];
  $assignment = $_POST["assignment"];
  $exam = $_POST["exam"];
  $quiz = $_POST["quiz"];
  $total = $_POST["total"];
  
  $sql2= "SELECT name FROM teachers WHERE username='$teachers'";
  $result2=mysqli_query($conn, $sql2);
  $ans2=mysqli_fetch_array($result2);
  $teacher_name=$ans2['name'];

  $sql3="SELECT * FROM info WHERE teacher='$teachers' and course='$course'";
  $result3=mysqli_query($conn, $sql3);
  $count3=mysqli_num_rows($result3);
  if($count3>1){
    echo"You Cannot assign same teacher to same course again!";
  }
  else{
    $sql = "INSERT INTO `info` (`teacher`,`t_name`, `course`, `courseName`) VALUES ('$teachers','$teacher_name', '$course','$courseName')";
    $result = mysqli_query($conn, $sql);
  }

// Sql query to be executed


if($result){ 
  $insert = true;
}
else{
  echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
}

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
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
          <a class="nav-link" href="admin_welcome.php" style ="color:white;">Admin Homepage <span class="sr-only">(current)</span></a>
        </li>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <li class="nav-item">
          <a class="nav-link" href="add_course.php" style ="color:white;">Add courses</a>
        </li>
        </div>
        
      </ul>
     

      <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        <a class="nav-link" href="logout.php" style="color:white; font-family: 'Alfa Slab One', cursive;"> <i class="fa fa-sign-out"></i> Logout</a>
      </li>
  </ul>
  </div>
  </nav>

  <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your data has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
     Your data has been <strong>deleted</strong> successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>


  <div class="container mt-4">
  <center>
  <h3>
      <?php echo "Welcome ". $_SESSION['username']?>
  </h3>
  </center>
    
    <hr>

<center>
    <div>
      <h3>If you want to add any course then <a type="button" class="btn btn-outline-success"
          href="add_course.php">Click here!</a> </h3>

    </div>
</center>

    <hr>
   
      <h2>Add and Edit informations </h2>
     <br>


    <div class="container">


      <div class="row">
        <div class="col-5">

          <img class="card-img-top" src="\Student_result\images\2.svg" alt="Card image cap">

        </div>

        <div class="col-7 mt-10">
          <form action="/student_result/admin_welcome.php" method="post">
            <div class="form-group">
              <label for="teachers">
                <h3>Teacher's Name: </h3>
              </label>
              <?php
              $sql = "SELECT * FROM teachers";
              $result = mysqli_query($conn, $sql);
               echo'<select name="teachers">';
               echo '<option> Select Teacher </option>';
               if($result)
               {
               if(mysqli_num_rows($result)>0)
               {
                 foreach($result as $row)
                 {
                   echo'<option value="'.$row['username'].'">'.$row['name'].'</option>';

                 }
               }
               }
           echo'</select>';  
              ?>
            </div>

            <div class="form-group">

              <input type="hidden" class="form-control" id="student" name="student" value="null"
                aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="course">
                <h3>Course Name: </h3>
              </label>
              <?php
              $sql = "SELECT * FROM course";
              $result = mysqli_query($conn, $sql );
               echo'<select name="course">';
               echo '<option> Select Course </option>';
               if($result)
               {
               if(mysqli_num_rows($result)>0)
               {
                 foreach($result as $row)
                 {
                  echo'<option value="'.$row['courseCode'].'">'.$row['courseName'].'</option>';
                  //  echo'<option value="'.$row['courseName']'>'.$row['courseName'].'</option>';

                 }
               }
               }
           echo'</select>'; 
                
              
              ?>




            </div>

            <div class="form-group">
              <input type="hidden" class="form-control" id="assignment" value="null" name="assignment"
                aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <input type="hidden" class="form-control" id="exam" name="exam" value="null" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <input type="hidden" class="form-control" id="quiz" name="quiz" value="null" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <input type="hidden" class="form-control" id="total" name="total" value="null"
                aria-describedby="emailHelp">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      <div class="container my-4">


        <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Teacher Name</th>
              <!-- <th scope="col">Student Name</th> -->
              <th scope="col">Course Name</th>
              <th scope="col">Course Code</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>



            <?php 
          $sql = "SELECT * FROM `info`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['teacher'] . "</td>
            <td>". $row['courseName'] . "</td>
            <td>". $row['course'] . "</td>
            <td><button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  </td>
          </tr>";
        } 
          ?>






          </tbody>
        </table>

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

    <script>

      deletes = document.getElementsByClassName('delete');
      Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
          console.log("edit ");
          sno = e.target.id.substr(1);

          if (confirm("Are you sure you want to delete this data!")) {
            console.log("yes");
            window.location = `/student_result/admin_welcome.php?delete=${sno}`;

          }
          else {
            console.log("no");
          }
        })
      })
    </script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#myTable').DataTable();
      });
    </script>
</body>
</html>
