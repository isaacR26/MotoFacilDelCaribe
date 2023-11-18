<?php

include('db.php');

if (isset($_POST['save_cliente'])) {
  $name = $_POST['name'];
  $last_name = $_POST['last_name'];
  $addres = $_POST['addres'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $query = "INSERT INTO customer(name,last_name,addres,email,phone,city) VALUES ('$name', '$last_name', '$addres', '$email', '$phone ', '$city')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Cliente Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: cliente.php');

}

?>