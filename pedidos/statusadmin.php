<?php
  include("database.php");
  //Se vacian los campos de la query para que no haya errores
  $Status = '';
  $Ntaxi = '';

  //Se sacan los datos de la BD
  if  (isset($_GET['IdPedido'])) {
    $IdPedido = $_GET['IdPedido'];
    $query = "SELECT * FROM pedidos WHERE IdPedido=$IdPedido";
    $result = mysqli_query($mysql, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $Ntaxi = $row['Ntaxi'];
    }
  }
  if (isset($_POST['btnstatus'])) {
    $Status = "Enviado";
    $Ntaxi = $_POST['Ntaxi'];
  
    $queryup = "UPDATE pedidos SET estado = '$Status', Ntaxi = '$Ntaxi' WHERE IdPedido=$IdPedido";
    mysqli_query($mysql, $queryup);
    $result = mysqli_query($mysql, $queryup);
    
?>
    <script type="text/javascript">window.location.href = 'pedidoadmin.php';</script>
<?php 
   
  }
?>