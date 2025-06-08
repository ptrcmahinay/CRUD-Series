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
$gender = $row['gender'];
$place = $row['place'];
// explode - reading from DB
$datasArr = explode(",", $datas);

if(isset($_POST['update'])){
  // name attributes
  $fname= $_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $datas = $_POST['data'];
  $gender = $_POST['gender'];
  $place = $_POST['place'];
  //implode - saving checkbox data to DB
  $allData = implode(",", $datas);

  $sql="UPDATE seriescrud set fname='$fname',lname='$lname',email='$email',mobile='$mobile',multipleData='$allData',gender='$gender',place='$place' where id='$id'";

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> 
    <title>Update data</title>
  </head>
  <body>
    <div class="container my-5">
      <form method="post">
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
            <input type="checkbox" name="data[]" value="JavaScript" <?php if(in_array("JavaScript", $datasArr)) echo "checked"; ?>> JavaScript
            <input type="checkbox" name="data[]" value="React" <?php if(in_array("React", $datasArr)) echo "checked"; ?>> React
            <input type="checkbox" name="data[]" value="HTML" <?php if(in_array("HTML", $datasArr)) echo "checked"; ?>> HTML
            <input type="checkbox" name="data[]" value="CSS" <?php if(in_array("CSS", $datasArr)) echo "checked"; ?>> CSS
          </div>

          <div class="my-3">
            Gender:
            <input type="radio" name="gender" value="male" <?php if($gender == "male") echo "checked"; ?>> Male
            <input type="radio" name="gender" value="female" <?php if($gender == "female") echo "checked"; ?>> Female
            <input type="radio" name="gender" value="kids" <?php if($gender == "kids") echo "checked"; ?>> Kids
          </div>

          <div>
            <select name="place">
              <option value="Naic" <?php if($place == 'Naic') echo 'selected'; ?>> Naic </option>
              <option value="Bagong Kalsada" <?php if($place == 'Bagong Kalsada') echo 'selected'; ?>>Bagong Kalsada</option>
              <option value="Bancaan" <?php if($place == 'Bancaan') echo 'selected'; ?>>Bancaan</option>
              <option value="Bucana Malaki" <?php if($place == 'Bucana Malaki') echo 'selected'; ?>>Bucana Malaki</option>
            </select>
          </div>

          <button type="submit" class="btn btn-dark btn-lg my-3" name="update">Update</button>
      </form>
    </div>
  </body>
</html>