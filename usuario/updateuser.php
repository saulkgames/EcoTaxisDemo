<?php
  include("database.php");
  //Se vacian los campos de la query para que no haya errores

  $Password= '';
  $Nombre= '';
  
  //Se sacan los datos de la BD
  if  (isset($_GET['IDUsuario'])) {
    $IDUsuario = $_GET['IDUsuario'];
    $query = "SELECT * FROM usuario WHERE IDUsuario=$IDUsuario";
    $result = mysqli_query($mysql, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $Password = $row['Password'];
      $Nombre = $row['Nombre'];
      
    }
  }
  if (isset($_POST['update'])) {
    $Password = $_POST['Password'];
    $Nombre = $_POST['Nombre'];
  
    $query = "UPDATE usuario SET Password = '$Password', Nombre = '$Nombre' WHERE usuario.IDUsuario=$IDUsuario";
    mysqli_query($mysql, $query);
    
?>
    <script type="text/javascript">window.location.href = 'signup.php';</script>
<?php 
   
  }
?>
<?php include('../partials/headeradmin.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="updateuser.php?IDUsuario=<?php echo $_GET['IDUsuario']; ?>" method="POST">
          <div class="form-group">
            <input name="Nombre" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Cambiar Nombre">
          </div>
          <div class="form-group">
            <input name="Password" type="text" class="form-control" value="<?php echo $Password; ?>" placeholder="Cambiar Contraseña">
          </div>
          <button class="btn btn-success" name="update">
            Actualizar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../partials/footer.php'); ?>