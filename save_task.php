<?php

include('db.php');

if (isset($_POST['save_task'])) {
  echo 'saving';
  $title = $_POST['title'];
  $description = $_POST['description'];
  $viat = $_POST['viat'];
  $various = $_POST['various'];
  $customerId = $_POST['customerId'];
  $pilotId = $_POST['pilotId'];
  $vehicleId = $_POST['vehicleId'];
  $query = "INSERT INTO task(title, description, viat, various, customerId, pilotId, vehicleId) 
              VALUES ('$title', '$description', '$viat', '$various', '$customerId', '$pilotId' ,'$vehicleId' );";
  $result = mysqli_query($conn, $query);
  if(!$result) {
     echo 'No funcionó';
  }

  

  $_SESSION['message'] = 'Task Created Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: interface.php');

}

?>
