<?php
include 'connect.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <title>Display data</title>
  </head>
  <body>
    <div class="container my-5">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Sl no</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // select query
        $sql="Select * from `seriescrud`";
        $result=mysqli_query($con, $sql);
        while($row=mysqli_fetch_assoc($result)){{
          $id = $row['id'];
          $fname = $row['fname'];
          $lname = $row['lname'];
          $email = $row['email'];
          $mobile = $row['mobile'];

          // concatenation ex '.$email,'
          echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$fname.'</td>
            <td>'.$lname.'</td>
            <td>'.$email.'</td>
            <td>'.$mobile.'</td>
          </tr>';
        }}
        ?>
          <td>
            <a href="#">Update</a>
            <a href="#">Delete</a>
          </td>
          
        </tbody>
      </table>
    </div>

  </body>
</html>