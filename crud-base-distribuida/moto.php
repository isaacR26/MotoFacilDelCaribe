<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_moto.php" method="POST">
          <div class="form-group mb-3">
            <input type="text" name="model" class="form-control" placeholder="Modelo" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="brand" class="form-control" placeholder="Marca" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="year" class="form-control" placeholder="Año" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="price" class="form-control" placeholder="Precio" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="stock" class="form-control" placeholder="Stock" autofocus>
          </div>
          <input type="submit" name="save_moto" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Year</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM vehiculo";
          $result_vehiculo = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_vehiculo)) { ?>
          <tr>
            <td><?php echo $row['model']; ?></td>
            <td><?php echo $row['brand']; ?></td>
            <td><?php echo $row['year']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['stock']; ?></td>


            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_moto.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
