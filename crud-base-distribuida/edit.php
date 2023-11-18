<?php
include("db.php");

$model = '';
$brand = '';
$year = '';
$price = '';
$stock = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM vehiculo WHERE id=$id";
  $result2 = mysqli_query($conn, $query);
  if (mysqli_num_rows($result2) == 1) {
    $row = mysqli_fetch_array($result2);
    $model = $row['model'];
    $brand = $row['brand'];
    $year = $row['year'];
    $price = $row['price'];
    $stock = $row['stock'];
  }
}


if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $model = $_POST['model'];
  $brand = $_POST['brand'];
  $year = $_POST['year'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];

  $query = "UPDATE vehiculo set model = '$model', brand = '$brand', year = '$year', price = '$price', stock = '$stock' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Moto Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: moto.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group mb-3">
            <input type="text" name="model" class="form-control" placeholder="Modelo" value="<?php echo $model; ?>"  autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="brand" class="form-control" placeholder="Marca" value="<?php echo $brand; ?>" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="year" class="form-control" placeholder="Año" value="<?php echo $year; ?>" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="price" class="form-control" placeholder="Precio" value="<?php echo $price; ?>"  autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="stock" class="form-control" placeholder="stock" value="<?php echo $stock; ?>"  autofocus>
          </div>
        <button class="btn-success" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
