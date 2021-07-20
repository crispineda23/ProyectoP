<?php

include('db.php');

if (isset($_POST['customer'])) {
  echo 'saving';
  $name = $_POST['name'];
  $cost = $_POST['cost'];
  $addressR = $_POST['addressR'];
  $addressD = $_POST['addressD'];
  $query = "INSERT INTO customers(name, cost, addressR, addressD) VALUES ('$name', '$cost', '$addressR','$addressD')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
     echo 'No funcionó';
  }

  

  $_SESSION['message'] = 'Customer Created Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: customer.php');

}

?>






