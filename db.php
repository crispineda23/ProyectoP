<?php
session_start();

$conn = mysqli_connect(
  'localhost:3306',
  'root',
  'admin',
  'micamioncitodb'
) or die(mysqli_erro($mysqli));

?>
