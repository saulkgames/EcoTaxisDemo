<?php
  include("database.php");
  //Se vacian los campos de la query para que no haya errores

  $Telefono = '';
  $Colonia = '';
  $Calleynum = '';
  $Entrecalle = '';
  $Observaciones = '';
  $Ntaxi = '';

  //Se sacan los datos de la BD
  if  (isset($_GET['IdPedido'])) {
    $IdPedido = $_GET['IdPedido'];
    $query = "SELECT * FROM pedidos WHERE IdPedido=$IdPedido";
    $result = mysqli_query($mysql, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $Telefono = $row['Telefono'];
      $Colonia = $row['Colonia'];
      $Calleynum = $row['Calleynum'];
      $Entrecalle = $row['Entrecalle'];
      $Observaciones = $row['Observacion'];
      $Ntaxi = $row['Ntaxi'];
    }
  }
  if (isset($_POST['update'])) {
    $Telefono = $_POST['Telefono'];
    $Colonia = $_POST['Colonia'];
    $Calleynum = $_POST['Calleynum'];
    $Entrecalle = $_POST['Entrecalle'];
    $Observaciones = $_POST['Observacion'];
    $Ntaxi = $_POST['Ntaxi'];
  
    $queryup = "UPDATE pedidos SET Telefono = '$Telefono', Colonia = '$Colonia', Calleynum = '$Calleynum', Entrecalle = '$Entrecalle', Observacion = '$Observaciones' WHERE IdPedido=$IdPedido";
    mysqli_query($mysql, $queryup);
?>
    <script type="text/javascript">window.location.href = 'pedido.php';</script>
<?php 
   
  }
?>
<?php include('../partials/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="update.php?IdPedido=<?php echo $_GET['IdPedido']; ?>" method="POST">
          <div class="form-group">
            <input name="Telefono" type="text" class="form-control" value="<?php echo $Telefono; ?>" placeholder="Cambiar Telefono">
          </div>
          <div class="form-group">
            <input name="Colonia" type="text" class="form-control" value="<?php echo $Colonia; ?>" placeholder="Cambiar Colonia">
          </div>
          <div class="form-group">
            <input name="Calleynum" type="text" class="form-control" value="<?php echo $Calleynum; ?>" placeholder="Cambiar Calle y Número">
          </div>
          <div class="form-group">
            <input name="Entrecalle" type="text" class="form-control" value="<?php echo $Entrecalle; ?>" placeholder="Cambiar Entrecalle">
          </div>
          <div class="form-group">
            <input name="Observacion" type="text" class="form-control" value="<?php echo $Observaciones; ?>" placeholder="Cambiar Observaciones">
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