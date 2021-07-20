<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "call sp_deleteVehicle($id)";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Vehicle Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: vehicles.php');
}

?>
