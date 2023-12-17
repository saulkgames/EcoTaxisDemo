<?php

include('database.php');

if (isset($_POST['create'])) {
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
  $Telefono = $_POST['Telefono'];
  $Colonia = $_POST['Colonia'];
  $Calleynum = $_POST['Calleynum'];
  $Entrecalle = $_POST['Entrecalle'];
  $Estado = "No enviado";
  $Observaciones = $_POST['Observacion'];
  $Usuario = $_SESSION['Id'];

  $queryins = "INSERT INTO pedidos (Telefono, Colonia, Calleynum, Entrecalle, Observacion, estado, Fecha, Usuario_IDUsuario) 
  VALUES ('$Telefono', '$Colonia', '$Calleynum', '$Entrecalle', '$Observaciones', '$Estado', CURRENT_TIMESTAMP(), '$Usuario')";
  $result = mysqli_query($mysql, $queryins);
  if(!$result) {
    die("Query Failed.");
  }
    $_SESSION['message']='Usuario guardado correctamente'; 
    $_SESSION['message_type']='success'; 
?>
    <script type="text/javascript">window.location.href = 'pedidoadmin.php';</script>
<?php 
}

?>