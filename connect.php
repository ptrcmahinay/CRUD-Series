<?php
// variable                  password (empty), database name 
$con=mysqli_connect('localhost', 'root', '', 'crudseries');

// show only if error
if(!$con){
  die(mysqli_error("Error"+$con));
}

?>