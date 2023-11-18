<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'final'
) or die(mysqli_erro($mysqli));

?>
