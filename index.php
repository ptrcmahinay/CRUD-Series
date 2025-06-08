<!-- connecting php (database) to html -->
<?php
include 'connect.php';

// name in the input
if (isset($_POST['submit'])) {
  // array used to collect form data after submitting an HTML form using the POST method.
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $datas=$_POST['data'];
  $allData = implode(",", $datas);
  $gender = $_POST['gender'];
  $place = $_POST['place'];

  // insert query - inserting data into database 
  $sql = "INSERT INTO `seriescrud` (fname, lname, email, mobile, multipleData, gender, place) 
  VALUES ('$fname','$lname','$email','$mobile','$allData','$gender','$place')";

  // $con var is in the connect.php file, variable sql=query
  // To execute insert query we uses mysqli_query method
  $result=mysqli_query($con,$sql);
  // if my data is successfully inserted data inside the database
  if ($result){
      header('location:read.php');
  } else{
    die(mysqli_error($con));
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP CRUD Series</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container my-5">
    <!-- Form to collect user data using the POST method for secure submission -->
    <form method="post">
      <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your first name:" name="fname" autocomplete="off">
      </div>
      <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your last name:" name="lname" autocomplete="off">
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter your email:" name="email" autocomplete="off">
      </div>
      <div class="mb-3">
        <label class="form-label">Mobile Number</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your mobile number:" name="mobile" autocomplete="off">
      </div>
      <div>
        <input type="checkbox" name="data[]" value="JavaScript"> JavaScript
        <input type="checkbox" name="data[]" value="React"> React
        <input type="checkbox" name="data[]" value="HTML"> HTML
        <input type="checkbox" name="data[]" value="CSS"> CSS
      </div>
      <div class="my-3">
        Gender: 
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="kids">Kids
      </div>

      <div>
        <select name="place">
          <option value="Naic">Naic</option>
          <option value="Bagong Kalsada">Bagong Kalsada</option>
          <option value="Bancaan">Bancaan</option>
          <option value="Bucana Malaki">Bucana Malaki</option>
        </select>
      </div>
    
      <button class="btn btn-dark btn-lg my-3" name="submit">Submit</button>
    </form>
  </div>
</body>

</html>