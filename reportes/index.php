<?php include("../partials/headeradmin.php")?>
<?php include("database.php"); ?>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"/>


<div class="container">
    <h3>Seleccione el periodo de tiempo para generar un historial</h3>

    <form action="" method="get">
      <div class="col-xs-7">
              <h4>Fecha de Inicio</h4>
              <input type="text" name="txtfecha" id="txtfecha"/> 
      </div>
      <div class="col-xs-3">
              <h4>Fecha de Término</h4>
              <input type="text" name="txtfechafinal" id="txtfechafinal"/>
      </div>
      <input type="submit" name="search" class="btn btn-success btn-block" value="Mostrar Reportes">
    </form>
</div>


<main class="container">
<div class="row">
    <div class="col-sm-12">
      <h3>Historial de pedidos</h3>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th># de Pedido</th>
            <th>Teléfono</th>
            <th>Colonia</th>
            <th>Calle y Numero</th>
            <th>Numero de Taxi</th>
            <th>Fecha</th>
            <th>Operador</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if(isset($_GET['search'])){
              $Fechaini = $_GET ['txtfecha'];
              $Fechafin = $_GET ['txtfechafinal'];

              $consulta = $mysql->query("SELECT IdPedido, Telefono, Colonia, Calleynum, Ntaxi, Fecha, Nombre FROM pedidos, usuario WHERE Usuario_IDUsuario=usuario.IDUsuario AND Fecha BETWEEN '$Fechaini' AND '$Fechafin' ORDER BY Fecha ASC");

              while($row = $consulta-> fetch_array()){ ?>
              <tr>
              <td><?php echo $row['IdPedido']; ?></td>
              <td><?php echo $row['Telefono']; ?></td>
              <td><?php echo $row['Colonia']; ?></td>
              <td><?php echo $row['Calleynum']; ?></td>
              <td><?php echo $row['Ntaxi']; ?></td>
              <td><?php echo $row['Fecha']; ?></td>
              <td><?php echo $row['Nombre']; ?></td>
              </tr>
              <?php } ?>
            <?php } ?>
        </tbody>
      </table>
    </div>
        <div class="col-sm-6">
        <h3>Cantidad de pedidos hechos por operador</h3>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Operador</th>
            <th># de Pedidos Realizados</th>
          </tr>
            <?php
            if(isset($_GET['search'])){
              $Fechaini = $_GET ['txtfecha'];
              $Fechafin = $_GET ['txtfechafinal'];

              $consulta = $mysql->query("SELECT Nombre, COUNT(*) Numped FROM usuario INNER JOIN pedidos ON pedidos.Usuario_IDUsuario=usuario.IDUsuario WHERE Fecha BETWEEN '$Fechaini' AND '$Fechafin' AND Nombre!='Eliminado' GROUP BY usuario.IDUsuario");
              $consulta2 = $mysql->query("SELECT COUNT(*) Totpedidos FROM pedidos WHERE Fecha BETWEEN '$Fechaini' AND '$Fechafin'");

              while($row = $consulta-> fetch_array()){ ?>
              <tr>
              <td><?php echo $row['Nombre']; ?></td>
              <td><?php echo $row['Numped']; ?></td>
              </tr>
              <?php } ?>
              <?php while($row2 = $consulta2-> fetch_array()){ ?>
                <tr>
                <td> <strong>Pedidos Totales</strong> </td>
                <td><?php echo $row2['Totpedidos']; ?></td>
                </tr>
                <?php } ?>
            <?php } ?>
          </thead>
          </table>
        </div>
        <div class="col-sm-6">
        <h3>Viajes realizados por cada Taxi</h3>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th># de taxi</th>
            <th># de viajes hechos</th>
          </tr>
          <?php
            if(isset($_GET['search'])){
              $Fechaini = $_GET ['txtfecha'];
              $Fechafin = $_GET ['txtfechafinal'];

              $consulta = $mysql->query("SELECT Ntaxi, COUNT(*) Cvia FROM pedidos WHERE Fecha BETWEEN '$Fechaini' AND '$Fechafin' GROUP BY Ntaxi");
              $consulta2 = $mysql->query("SELECT COUNT(*) as pedcancel FROM pedidos WHERE Fecha BETWEEN '$Fechaini' AND '$Fechafin' AND (Ntaxi = 'c' OR Ntaxi = 'C' OR Ntaxi = '00')");

              while($row = $consulta-> fetch_array()){ ?>
              <tr>
              <td><?php echo $row['Ntaxi']; ?></td>
              <td><?php echo $row['Cvia']; ?></td>
              </tr>
              <?php } ?>
            <?php while($row2 = $consulta2-> fetch_array()){ ?>
              <tr>
              <td> <strong>Pedidos Cancelados</strong> </td>
              <td><?php echo $row2['pedcancel']; ?></td>
              </tr>
              <?php } ?>
          <?php } ?>
        </thead>
        </table>
        </div>
    </div>
</main>


<?php include('../partials/footeradmin.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Selector de Fechas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/jquery-ui.min.css"/>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>

        <script>
            $(function () {
                $("#txtfecha").datepicker({ dateFormat: 'yy-mm-dd' });
            });
        </script>
    </head>
<script>
           $(function () {
                $("#txtfechafinal").datepicker({ dateFormat: 'yy-mm-dd' });
            });
        </script>
</html>