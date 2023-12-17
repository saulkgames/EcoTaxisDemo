<?php include("../partials/header.php")?>
<?php include("database.php"); ?>

<main class="container p-5  ">
  <div class="row">
    <div class=".col-md-3 .offset-md-3">
      <!-- MESSAGES -->
    <div class=".col-md-3 .offset-md-3">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th># de Pedido</th>
            <th>Numero de Taxi</th>
            <th>Tipo de reporte</th>
            <th>Descripcion</th>
            <th>Fecha y Hora</th>
            <th>Operador</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT IdPedido, Ntaxi, tiporeporte, descriprepor, fecha, Nombre FROM pedidos, usuario WHERE Usuario_IDUsuario=usuario.IDUsuario AND tiporeporte IS NOT NULL ORDER BY fecha DESC";
          $pedidosinf = mysqli_query($mysql, $query);    

          while($row = mysqli_fetch_assoc($pedidosinf)) { ?>
          <tr>
            <td><?php echo $row['IdPedido']; ?></td>
            <td><?php echo $row['Ntaxi']; ?></td>
            <td><?php echo $row['tiporeporte']; ?></td>
            <td><?php echo $row['descriprepor']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td>
              <a href="deletereport.php?IdPedido=<?php echo $row['IdPedido']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('../partials/footer.php'); ?>