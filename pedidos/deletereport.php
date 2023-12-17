<?php

include("database.php");

if(isset($_GET['IdPedido'])) {
  $IdPedido = $_GET['IdPedido'];
  $querydel = "UPDATE pedidos SET tiporeporte = Null, descriprepor = Null  WHERE IdPedido=$IdPedido";
  $result = mysqli_query($mysql, $querydel);
  if(!$result) {
    die("Query Failed.");
  }

 
  header('Location: reportes.php');
?>
    <script type="text/javascript">window.location.href = 'reportes.php';</script>
<?php 
}

?>