<?php

include("database.php");

if(isset($_GET['IdPedido'])) {
  $IdPedido = $_GET['IdPedido'];
  $querydel = "DELETE FROM pedidos WHERE pedidos.IdPedido= $IdPedido";
  $result = mysqli_query($mysql, $querydel);
  if(!$result) {
    die("Query Failed.");
  }

?>
    <script type="text/javascript">window.location.href = 'pedido.php';</script>
<?php 
}

?>