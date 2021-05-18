<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    
}
require_once "config.php";
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap"
    rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/design.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Student Home</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" style="color:white; font-family: 'Alfa Slab One', cursive;" href="index.php">Brooklyn nine
          nine! </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
    
        <div class="navbar-collapse collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="logout.php" style="color:white; font-family: 'Alfa Slab One', cursive;"> <i class="fa fa-sign-out"></i> Logout</a>
            </li>
          </ul>
      </nav>

<div class="container mt-4">
<h3><?php echo "Welcome ". $_SESSION['username']?>!</h3>


<hr>

<br><br>

<div class="container">

    <?php if($_SESSION['msg']!="null")
    {
        echo '<h5 style="color: green;">'.$_SESSION['msg'].'</h5>';
    }
    else
    {

    }
     $_SESSION['msg']="null";?>
</div>

</div>

<div class="container">
  <div class="row">
      <table class="table" border="1">
          <tr>
        <th>
            Course Name
        </th>
        <th>
            Course Code
        </th>
        <th>
            Teacher Name
        </th>
        <th>
            Enroll course
        </th>
        </tr>

        <?php
            $query="SELECT * FROM info";
            $res=mysqli_query($conn,$query);
            if($res)
            {
                if(mysqli_num_rows($res)>0)
                {
                    while($rows=mysqli_fetch_array($res))
                    {
                        ?>
                        <tr>
                            <td><?php echo $rows['courseName'] ?></td>
                            <td><?php echo $rows['course'] ?></td>
                            <td><?php echo $rows['teacher'] ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="teacher" value="<?php echo $rows['teacher']?>">
                                    <input type="hidden" name="course" value="<?php echo $rows['course']?>">
                                    <input type="hidden" name="coursename" value="<?php echo $rows['courseName']?>">
                                    <input type="submit" class="btn btn-success">
                                </form>
                            </td>
                    </tr>
                        <?php
                    }
                }
            }

            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $teacher=$_POST['teacher'];
                $std=$_SESSION['username'];
                $courseCode=$_POST['course'];
                $courseName=$_POST['coursename'];
                $check="SELECT std_name FROM main WHERE std_name='$std' and courseCode='$courseCode'";
                $check_res=mysqli_query($conn, $check);
                $count=mysqli_num_rows($check_res);
                if($count>0)
                {
                    $_SESSION['msg']="You are enrolled in this course already!";
                }
                else{
                    $insert= "insert into main (std_name, courseCode, courseName, teacher) values ('$std','$courseCode','$courseName', '$teacher')";
                    $success=mysqli_query($conn, $insert);
                    if($success)
                    {   
                        $_SESSION['msg']="Course added Successfully!";

                    }
                }
                
            }
        ?>
      </table>
  </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

