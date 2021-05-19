<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  $con = mysqli_connect('server','username','password','database');

  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

?>
