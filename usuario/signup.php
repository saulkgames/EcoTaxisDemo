<?php include("../partials/headeradmin.php")?>
<?php include("../database.php"); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

    

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="createuser.php" method="POST">
          <div class="form-group">
            <input type="text" name="Usuario" class="form-control" placeholder="Usuario" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Password" class="form-control" placeholder="Contrase&ntilde;a">
          </div>
          <div class="form-group">
            <input type="text" name="Nombre" class="form-control" placeholder="Nombre">
          </div>
          <div class="p-2 bg-light border">
          <select class="form-select" aria-label="Default select example" name="Rol">
              <option selected>Seleccionar Rol</option>
              <option value="Administrador">Administrador</option>
              <option value="Operador">Operador</option>
          </select>
          </div>
          <input type="submit" name="create" class="btn btn-success btn-block" value="Registrar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th># de Usuario</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Rol</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM usuario WHERE IDUsuario != 14";
          $result_user = mysqli_query($mysql, $query);    

          while($row = mysqli_fetch_assoc($result_user)) { ?>
          <tr>
            <td><?php echo $row['IDUsuario']; ?></td>
            <td><?php echo $row['Usuario']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Rol']; ?></td>
            <td>
              <a href="updateuser.php?IDUsuario=<?php echo $row['IDUsuario']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deleteuser.php?IDUsuario=<?php echo $row['IDUsuario']?>" class="btn btn-danger">
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

<?php include('../partials/footeradmin.php'); ?>