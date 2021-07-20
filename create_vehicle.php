<?php

include('db.php');



if (isset($_POST['vehicle'])) {
  echo 'saving';
  $name = $_POST['name'];
  $capacity = $_POST['capacity'];
  $gas = $_POST['gas'];
  $distance = $_POST['distance'];
  $dispoV = $_POST['dispoV'];
  $depV = $_POST['depV'];
  $type = $_POST['type'];
  $query = "call sp_createVehicle('$name', '$capacity', '$gas','$distance','$dispoV','$depV','$type' )";
  $result = mysqli_query($conn, $query);
  if(!$result) {
     echo 'No funcionó';
  }

  

  $_SESSION['message'] = 'Vehicle Created Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: vehicles.php');

}

?>




