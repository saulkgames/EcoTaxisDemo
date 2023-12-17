<?php

include('database.php');

if (isset($_POST['create'])) {
  $Origen = $_POST['Origen'];
  $Destino = $_POST['Destino'];
  $Tarifa = $_POST['Tarifa'];

  $queryins = "INSERT INTO cruces (Origen, Destino, Tarifa) 
  VALUES ('$Origen', '$Destino', '$Tarifa')";
  $result = mysqli_query($mysql, $queryins);
  if(!$result) {
    die("Query Failed.");
  }
    $_SESSION['message']='Usuario guardado correctamente'; 
    $_SESSION['message_type']='success'; 
?>
    <script type="text/javascript">window.location.href = 'cruce.php';</script>
<?php 
}

?>