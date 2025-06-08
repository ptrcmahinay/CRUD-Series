<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagination</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container my-5">
  <table class="table">
  <thead class="bg-dark text-light">
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Mobile</th>
    </tr>
  </thead>

  <tbody>
    <?php 
      $sql="SELECT * from `seriescrud`";
      $result=mysqli_query($con, $sql);
      $num=mysqli_num_rows($result);
      $numberPages=2;
      $totalPages=ceil($num/$numberPages);
      // echo $totalPages;
      //creating pagination buttons
      for($btn=1;$btn<=$totalPages;$btn++){
        echo '<a href="pagination.php?page='.$btn.'" class="text-light"><button class="btn btn-dark mx-1 mb-3">'.$btn.'</button></a>';
      }
      if(isset($_GET['page'])){
        $page=$_GET['page'];
      } else{
        $page=1;
      }

      $startinglimit = ($page-1)*$numberPages;
      $sql="SELECT * from `seriescrud` limit ".$startinglimit.",".$numberPages;
      $result=mysqli_query($con, $sql);

      while($row=mysqli_fetch_assoc($result)){
        echo '<tr>
          <th>'.$row['id'].'</th>
          <td>'.$row['fname'].'</td>
          <td>'.$row['lname'].'</td>
          <td>'.$row['mobile'].'</td>
        </tr>';
      }
    ?>
  </tbody>
</table>
  </div>
</body>
</html>