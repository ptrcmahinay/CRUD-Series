<?php
include 'connect.php';

if(isset($_POST['submit'])){
  $place = $_POST['place'];
  $sql = "INSERT INTO `selectdata` (place) values ('$place')";

  $result=mysqli_query($con, $sql);

  if($result){
    echo "Data inserted successfully";
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
  <title>Select option data</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container my-5">
    <form method="post">
      <div>
        <select name="place">
          <option value="Naic">Naic</option>
          <option value="Bagong Kalsada">Bagong Kalsada</option>
          <option value="Bancaan">Bancaan</option>
          <option value="Bucana Malaki">Bucana Malaki</option>
        </select>
      </div>

      <div class="my-5">
        <button type="submit" name="submit" class="btn btn-dark my-5">Submit</button>
      </div>   
    </form>
  </div>
</body>
</html>