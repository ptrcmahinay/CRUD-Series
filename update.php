<?php
include 'connect.php';

$id=$_GET['updateid'];
$sql="Select * from seriescrud where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

// fetching data from database
$fname= $row['fname'];
$lname=$row['lname'];
$email=$row['email'];
$mobile=$row['mobile'];
$datas = $row['multipleData'];

if(isset($_POST['update'])){
  // name attributes
  $fname= $_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $datas = $_POST['data'];
  $allData = implode(",", $datas);

  $sql="update seriescrud set fname='$fname',lname='$lname',email='$email',mobile='$mobile',multipleData='$allData' where id='$id'";
  $result=mysqli_query($con,$sql);
  if($result){
    //  echo "updated successfully";
    header('location:read.php');
  }else{
      die(mysqli_error($con));
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> 
    <title>Update data</title>
  </head>
  <body>
    <div class="container my-5">
      <form method="post">
        <form>
          <div class="form-group">
            <label >First Name</label>
            <input type="text" class="form-control" autocomplete="off" name="fname" value=<?php echo $fname?>>
          </div>

          <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" autocomplete="off" name="lname" value=<?php echo $lname?>>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" autocomplete="off" name="email" value=<?php echo $email?>>
          </div>

          <div class="form-group">
            <label>Mobile</label>
            <input type="text" class="form-control" autocomplete="off" name="mobile" value=<?php echo $mobile?>>
          </div>

          <div>
            <input type="checkbox" name="data[]" value="JavaScript"> JavaScript
            <input type="checkbox" name="data[]" value="React"> React
            <input type="checkbox" name="data[]" value="HTML"> HTML
            <input type="checkbox" name="data[]" value="CSS"> CSS
          </div>

          <button type="submit" class="btn btn-dark btn-lg my-3" name="update">Update</button>
        </form>
      </form>
    </div>
  </body>
</html>