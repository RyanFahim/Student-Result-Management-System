<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("location: teacher_login.php");
}

require_once "config.php";
$courseCode=$_GET['course'];
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
   


    <title>Manage_course</title>
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
<h3><?php echo "Welcome ". $_SESSION['username'];?>! You can now use this website</h3>
<hr>

<br><br><br>
<h2>Manage <?php echo $courseCode; ?> Course</h2> <hr>
</div>
<div class="container">
<div class="row">

<?php
$username=$_SESSION['username'];

$sql = "SELECT * FROM main WHERE teacher='$username' and courseCode='$courseCode'";
$result = mysqli_query($conn, $sql);
$count= mysqli_num_rows($result);
?>

<table class="table" border="1">
<tr>
    <th>Student Name</th>
    <th>Quiz (15)</th>
    <th>Mid (25)</th>
    <th>Final (30)</th>
    <th>Assignment (20)</th>
    <th>Presentation (10) </th>
    <th>Total (100)</th>
    <th>Grade</th>
    <th>Change</th>
</tr>
<?php 
    
    if($result){
        if(mysqli_num_rows($result)>0)
        {
            while($rows=mysqli_fetch_array($result))
            {
              echo '<tr>';
                echo '<form action="" method="post"> <td>'.$rows['std_name'].'</td>';
                echo '<input type="hidden" value="'.$rows['std_name'].'" name="std">';
                echo '<td><input type="number" value="'.$rows['quiz'].'" name="quiz"></td>';
                echo '<td><input type="number" value="'.$rows['mid'].'" name="mid"></td>';
                echo '<td><input type="number" value="'.$rows['final'].'" name="final" ></td>';
                echo '<td><input type="number" value="'.$rows['assignment'].'" name="assignment" ></td>';
                echo '<td><input type="number" value="'.$rows['presentation'].'" name="presentation" ></td>';
                echo '<td>'.$rows['total'].'</td>';
                echo '<td>'.$rows['grade'].'</td>';
                echo '<td><input type="submit" class="btn btn-primary" value="Confirm"></td>';
                echo '</form>';
                echo '</tr>';
            }
        }
    }
   

?>
</table>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $std= $_POST['std'];
    $quiz= $_POST['quiz'];
    $mid=$_POST['mid'];
    $final= $_POST['final'];
    $assignment= $_POST['assignment'];
    $presentation= $_POST['presentation'];
    $total= (float)$quiz+ (float)$mid+ (float)$final+ (float)$assignment+ (float)$presentation;
                
                if($total>0 && $total<60)
                {
                    $grade="F";

                }
                else if($total>=60 && $total<63)
                {
                    $grade="D";
                }
                else if($total>=63 && $total<67)
                {
                    $grade="D+";
                }
                else if($total>=67 && $total<70)
                {
                    $grade="C-";
                }
                else if($total>=70 && $total<73)
                {
                    $grade="C";
                }
                else if($total>=73 && $total<77)
                {
                    $grade="C+";
                }
                else if($total>=77 && $total<80)
                {
                    $grade="B-";
                }
                else if($total>=80 && $total<83)
                {
                    $grade="B";
                }
                else if($total>=83 && $total<87)
                {
                    $grade="B+";
                }
                else if($total>=87 && $total<90)
                {
                    $grade="A-";
                }
                else if($total>=90 && $total<97)
                {
                    $grade="A";
                }
                else if($total>=97)
                {
                    $grade="A+";
                }
                else
                {
                    $grade="W";
                }



    $update="UPDATE main SET quiz='$quiz', mid='$mid', final='$final', assignment='$assignment', presentation='$presentation', total='$total', grade='$grade' WHERE courseCode='$courseCode' and std_name='$std'";

    $update_res=mysqli_query($conn, $update);
    if($update_res)
    {
        echo "SUCCESS!";
        header("Refresh:0");
    }
} 


?>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

