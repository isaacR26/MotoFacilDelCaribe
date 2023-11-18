<?php

include('db.php');

if (isset($_POST['save_moto'])) {
  $model = $_POST['model'];
  $brand = $_POST['brand'];
  $year = $_POST['year'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  $query = "INSERT INTO vehiculo(model,brand,year,price,stock) VALUES ('$model','$brand','$year','$price','$stock')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Moto Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: moto.php');

}

?>
