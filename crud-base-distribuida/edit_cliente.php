<?php
include("db.php");

  $name ='';
  $last_name ='';
  $addres = '';
  $email = '';
  $phone = '';
  $city = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM customer WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $last_name = $row['last_name'];
    $addres = $row['addres'];
    $email = $row['email'];
    $phone = $row['phone'];
    $city = $row['city'];
  }
}

if (isset($_POST['update2'])) {
  $id = $_GET['id'];
  $name = $_POST['name'];
  $last_name= $_POST['last_name'];
  $addres = $_POST['addres'];
  $email = $_POST['email']; 
  $phone = $_POST['phone'];
  $city = $_POST['city'];

  $query = "UPDATE customer set name = '$name', last_name = '$last_name', addres = '$addres', email = '$email', phone='$phone', city='$city'  WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'cliente Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: cliente.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_cliente.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Nombre" value="<?php echo $name; ?>" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="last_name" class="form-control" placeholder="Apellido" value="<?php echo $last_name; ?>" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="addres" class="form-control" placeholder="Direccion" value="<?php echo $addres; ?>" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="email" value="<?php echo $email; ?>" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="phone" class="form-control" placeholder="Telefono" value="<?php echo $phone; ?>" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="city" class="form-control" placeholder="ciudad" value="<?php echo $city; ?>" autofocus>
          </div>
        <button class="btn-success" name="update2">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
