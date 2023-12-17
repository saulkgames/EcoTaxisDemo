<?php
  include("database.php");
  //Se vacian los campos de la query para que no haya errores

  $Origen = '';
  $Destino = '';
  $Tarifa = '';

  //Se sacan los datos de la BD
  if  (isset($_GET['idCruce'])) {
    $idCruce = $_GET['idCruce'];
    $query = "SELECT * FROM cruces WHERE idCruce=$idCruce";
    $result = mysqli_query($mysql, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $Origen = $row['Origen'];
      $Destino = $row['Destino'];
      $Tarifa = $row['Tarifa'];
    }
  }
  if (isset($_POST['update'])) {
    $Origen = $_POST['Origen'];
    $Destino = $_POST['Destino'];
    $Tarifa = $_POST['Tarifa'];
    $queryup = "UPDATE cruces SET Origen = '$Origen', Destino = '$Destino', Tarifa = '$Tarifa' WHERE idCruce=$idCruce";
    mysqli_query($mysql, $queryup);
    $result = mysqli_query($mysql, $queryup);
?>
    <script type="text/javascript">window.location.href = 'cruce.php';</script>
<?php 
   
  }
?>
<?php include('../partials/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="update.php?idCruce=<?php echo $_GET['idCruce']; ?>" method="POST">
          <div class="form-group">
            <input name="Origen" type="text" class="form-control" value="<?php echo $Origen; ?>" placeholder="Cambiar Punto de Origen">
          </div>
          <div class="form-group">
            <input name="Destino" type="text" class="form-control" value="<?php echo $Destino; ?>" placeholder="Cambiar Punto de Destino">
          </div>
          <div class="form-group">
            <input name="Tarifa" type="text" class="form-control" value="<?php echo $Tarifa; ?>" placeholder="Cambiar Tarifa">
          </div>
          <button class="btn btn-success" name="update">
            Actualizar Cruce
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../partials/footer.php'); ?>