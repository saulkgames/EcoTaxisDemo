<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if ($_SESSION['Nombre_Completo'] === NULL){
?>
    <script type="text/javascript">window.location.href = '/EcoTaxisDemo/login.php';</script>
<?php 
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>EcoTaxis Guamuchil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP 4 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/EcoTaxisDemo/assets/css/style.css">
</head>
  <body>

  <nav class="navbar navbar-dark bg-dark justify-content-between">
      <div class="container">
        <a class="navbar-brand" href="/EcoTaxisDemo/index.php">EcoTaxis Guamuchil</a>
        <a class="navbar-brand"><?php
        echo $_SESSION['Nombre_Completo'] ?></a> 
        <a class="navbar-brand" href="/EcoTaxisDemo/pedidos/pedido.php">Hacer Pedido</a>
        <a class="navbar-brand" href="/EcoTaxisDemo/pedidos/verpedido.php">Ver Pedidos</a>
        <a class="navbar-brand" href="/EcoTaxisDemo/cruces/cruce.php">Ver Cruces</a>
        <a class="navbar-brand" href="/EcoTaxisDemo/pedidos/reportes.php">Ver Reportes</a>
        <form class="form-inline">
        <a class="btn btn-outline-danger my-2 my-sm-0" href="/EcoTaxisDemo/CerrarSesion.php">Salir</a>
        </form>
      </div>
    </nav>
