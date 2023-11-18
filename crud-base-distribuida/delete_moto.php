<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM vehiculo WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Moto Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: moto.php');
}

?>
