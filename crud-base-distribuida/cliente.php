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
        <form action="save_cliente.php" method="POST">
          <div class="form-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="last_name" class="form-control" placeholder="Apellido" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="addres" class="form-control" placeholder="Dirección" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="email" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="phone" class="form-control" placeholder="Telefono" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="city" class="form-control" placeholder="Ciudad" autofocus>
          </div>
          <input type="submit" name="save_cliente" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Ciudad</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM customer";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['addres']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td>
              <a href="edit_cliente.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_cliente.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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
