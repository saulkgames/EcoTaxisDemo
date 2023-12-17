<?php

include("database.php");

if(isset($_GET['IDUsuario'])) {
  $IDUsuario = $_GET['IDUsuario'];
  $queryupd = "UPDATE pedidos SET Usuario_IDUsuario = 14 WHERE Usuario_IDUsuario = $IDUsuario";
  $queryeli = "DELETE FROM usuario WHERE IDUsuario = $IDUsuario";
  $result1 = mysqli_query($mysql, $queryupd);
  $result2 = mysqli_query($mysql, $queryeli);
  if(!$result2) {
    die("El usuario tiene Pedidos Realizados");
  }

 
?>
    <script type="text/javascript">window.location.href = 'signup.php';</script>
<?php 
}
?>

