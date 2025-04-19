<?php
include 'connect.php';

$id=$_GET['updateid'];
$sql="Select * from seriescrud where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$fname= $row['fname'];
$lname=$row['lname'];
$email=$row['email'];
$mobile=$row['mobile'];

if(isset($_POST['update'])){
  $fname= $_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];

  $sql="update seriescrud set fname='$fname',lname='$lname',email='$email',mobile='$mobile' where id='$id'";
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

        <button type="submit" class="btn btn-dark btn-lg" name="update">Update</button>
      </form>
    </form>
  </div>
  </body>
</html>