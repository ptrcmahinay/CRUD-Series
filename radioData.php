<?php
include 'connect.php';

if(isset($_POST['submit'])){
  $gender = $_POST['gender'];
  $sql = "INSERT INTO `radiodata` (gender) VALUES ('$gender')";
  $result = mysqli_query($con, $sql);

  if($result){
    echo "Data of Radio Button inserted successfully";
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
  <title>Radio Button Data</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

</head>
<body>
  <div class="container my-5">
    <form method="post">
      <div>
        <input type="radio" name="gender" value="male">Male
      </div>
      <div>
        <input type="radio" name="gender" value="female">Female
      </div>
      <div>
        <input type="radio" name="gender" value="kids">Kids
      </div>
      <button type="submit" name="submit" class="btn btn-dark my-5">Submit</button>
    </form>
  </div>
</body>
</html>