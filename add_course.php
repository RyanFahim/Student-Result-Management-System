<?php
require_once "config.php";

session_start();
$check_auth= $_SESSION['username'];
$count=0;
$sql_check="select * from admin where username='$check_auth'";
$res_check=mysqli_query($conn, $sql_check);
$count=mysqli_num_rows($res_check);
if($count<1)
{
  echo "Un-Authorized Access! Access Denied!";
  echo '<br> <a href="logout.php"> DESTROY SESSION! </a>';
}
else
{

 $insert = false;
 $delete = false;


if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql_d = "DELETE FROM `course` WHERE `sno` = $sno";
    $res_d = mysqli_query($conn, $sql_d);
}

if(($_SERVER['REQUEST_METHOD'] == 'POST')){

    $courseName = $_POST["courseName"];
    $courseCode = $_POST["courseCode"];

    $sql = "INSERT INTO`course` ( `courseName`, `courseCode`) VALUES('$courseName', '$courseCode') ";
    // $sql ="INSERT  `course` ( `courseName`, `courseCode`)
    $res = mysqli_query($conn, $sql);

    if($res){
        $insert = true;
    }
    else{
        echo "Something ie wrong";
    }


}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>B99!</title>
  </head>
  <body>


  <title>Brooklyn Nine-Nine!</title>
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
        <a class="nav-link" href="logout.php" style ="color:white;"> <i class="fa fa-sign-out"></i> Logout</a>
      </li>
  </ul>
  </div>
  </nav>

    
<?php

if($insert){

    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> The course has been added.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}
?>
<?php
if($delete){

    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Deleted!</strong> The course has been deleted.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";   

}
?>

<div class="container mt-4">
<center><h3>Welcome Admin! Here you can add courses</h3></center>
<hr>
<div class="row">
    <div class="col-4">
        
  <img class="card-img-top" src="\Student_result\images\1.svg" alt="Card image cap">
  
</div>
    

    <div class="col-7" style="padding-right: 10px;">

<form action= "/student_result/add_course.php" method="post" >
  <div class="form-group">
    <label for="exampleInputEmail1">Course Name</label>
    <input type="text" class="form-control" name= "courseName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Course Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Course Code</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name= "courseCode" aria-describedby="emailHelp" placeholder="Enter Course Code">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>



<hr>

<div class="mt-4">

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="S.no">#</th>
      <th scope="col">Course Name</th>
      <th scope="col">Course Code</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>


    
  <?php
$sql = "SELECT * FROM `course`";
$result = mysqli_query($conn, $sql);
$sno = 0;
while($row = mysqli_fetch_assoc($result)){
    $sno = $sno + 1;
    echo "<tr>
      <th scope='row'>" .$sno."</th>
      <td>" .$row['courseName']. "</td>
      <td> ". $row['courseCode']."</td>
      <td><button class='delete btn btn-outline-danger' id=d".$row['sno'].">Delete</button></td>
      
    </tr>";
    
    

}
?>

  </tbody>
</table>
</div>
</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>

        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
          element.addEventListener("click", (e) => {
            console.log("edit ");
            sno = e.target.id.substr(1);
  
            if (confirm("Are you sure you want to delete this data!")) {
              console.log("yes");
              window.location = `/student_result/add_course.php?delete=${sno}`;
              
            }
            else {
              console.log("no");
            }
          })
        })
      </script>

    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script>
                $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

  </body>
</html>
<?php }?>