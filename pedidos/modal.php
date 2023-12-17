<?php
  include("database.php");
  //Se vacian los campos de la query para que no haya errores

  $tiporeporte = '';
  $descriprepor = '';
 

  //Se sacan los datos de la BD
  if  (isset($_GET['IdPedido'])) {
    $IdPedido = $_GET['IdPedido'];
    $query = "SELECT * FROM pedidos WHERE IdPedido=$IdPedido";
    $result = mysqli_query($mysql, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $tiporeporte = $row['tiporeporte'];
      $descriprepor = $row['descriprepor'];
    
    }
  }
  if (isset($_POST['modal'])) {
    $tiporeporte = $_POST['tiporeporte'];
    $descriprepor = $_POST['descriprepor'];
  
  
    $queryup = "UPDATE pedidos SET tiporeporte = '$tiporeporte', descriprepor = '$descriprepor' WHERE IdPedido=$IdPedido";
    mysqli_query($mysql, $queryup);
    $result = mysqli_query($mysql, $queryup);
?>
    <script type="text/javascript">window.location.href = 'pedido.php';</script>
<?php 
   
  }
?>
<?php include('../partials/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class=".col-md-3 .ms-md-auto">
      <div class="card card-body">
        <form action="modal.php?IdPedido=<?php echo $_GET['IdPedido']; ?>" method="POST">
          <select class="form-select" aria-label="Large select example" name="tiporeporte">
              <option selected>Tipo de reporte</option>
              <option value="Objeto perdido">Objeto perdido</option>
              <option value="Taxi">Taxi</option>
          </select>
          <label for="exampleFormControlTextarea1" class="form-label">Contenido del reporte</label>
          <div class="form-group">
            <textarea name="descriprepor" id="exampleFormControlTextarea1" class="form-control" value="<?php echo $descriprepor; ?>" placeholder="Descripcion de reporte" rows="3"></textarea>
          </div>
          <button class="btn btn-success mt-3" name="modal">
            Guardar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../partials/footer.php'); ?>