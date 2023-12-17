<?php include("../partials/headeradmin.php")?>
<?php include("database.php"); ?>

<main class="container p-4">
<link rel="stylesheet" href="/EcoTaxisDemo/assets/css/elimflec.css">
  <div class="row">
    <link rel="stylesheet" href="../assets/css/stylemodal.css">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <div class="card card-body">
        <form action="" method="GET">
          <div class="form-group">
            <div class="input-group">
            <input type="search" name="Buscador" class="form-control" placeholder="Buscar Taxi"> 
            </div>
            <br>
            <input type="submit" name="buscar" class="btn btn-success btn-block" value="Buscar">
          </div>
        </form>
      </div>

      <div class="card card-body">
        <form action="createadmin.php" method="POST" autocomplete="on">
          <div class="form-group">
            <h3 name="idped">Pedido</h3>
          </div>
          <div class="form-group">
            <input type="text" name="Telefono" class="form-control" placeholder="Teléfono" autocomplete="on" >
          </div>
          <div class="form-group">
            <input type="text" name="Colonia" class="form-control" placeholder="Colonia" autocomplete="on" autofocus required >
          </div>
          <div class="form-group">
            <input type="text" name="Calleynum" class="form-control" placeholder="Calle y Número" autocomplete="on">
          </div>
          <div class="form-group">
            <input type="text" name="Entrecalle" class="form-control" placeholder="Entre Calles" autocomplete="on" >
          </div>  
          <div class="form-group">
            <input type="text" name="Observacion" class="form-control" placeholder="Observaciones" autocomplete="on">
          </div>
          <input type="submit" name="create" class="btn btn-success btn-block" value="Registrar Pedido">
        </form>
      </div>
    </div>          
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th># de Pedido</th>
            <th>Teléfono</th>
            <th>Colonia</th>
            <th>Calle y Numero</th>
            <th>EntreCalles</th>
            <th>Observaciones</th>
            <th>Numero de Taxi</th>
            <th>Fecha y Hora</th>
            <th>Operador</th>
          </tr>
        </thead>
        <tbody>

        <?php 
            if(isset($_GET['buscar'])) {
              $Taxinum = $_GET['Buscador'];
              $querysearch = "SELECT IdPedido, Telefono, Colonia, Calleynum, Entrecalle, Observacion, Fecha, Ntaxi, Nombre FROM pedidos, usuario WHERE Ntaxi LIKE '%".$Taxinum."%' AND Usuario_IDUsuario=usuario.IDUsuario AND fecha >= CURRENT_DATE ORDER BY fecha DESC";
              $sear = mysqli_query($mysql, $querysearch);
              if($sear -> num_rows > 0) {
              while($row = mysqli_fetch_assoc($sear)) { ?>
                <tr>
                <td><?php echo $row['IdPedido']; ?></td>
                <td><?php echo $row['Telefono']; ?></td>
                <td><?php echo $row['Colonia']; ?></td>
                <td><?php echo $row['Calleynum']; ?></td>
                <td><?php echo $row['Entrecalle']; ?></td>
                <td><?php echo $row['Observacion']; ?></td>
                <td>
                <?php if ($row['Ntaxi'] >= 1) {  ?> 
                  <!-- TAXI agregado -->
                  <form action="statusadmin.php?IdPedido=<?php echo $row['IdPedido']?>" method="POST">
                    <div class="input-group">
                      <input type="number" name="Ntaxi" class="form-control" placeholder="#"  autocomplete="off" required>
                      <button type="submit" class="btn btn-success" name="btnstatus"><?php echo $row['Ntaxi'];?></button>
                    </div>
                  </form>
                  <?php } elseif ($row['Ntaxi'] == "00" || $row['Ntaxi'] == "C" || $row['Ntaxi'] == "c") { ?>
                  <!-- TAXI CANCELADO -->
                  <button type="button" class="btn btn-warning">
                    CANCELADO
                  </button> 
                  <?php }else {?>
                  <!-- agregado TAXI -->
                  <form action="statusadmin.php?IdPedido=<?php echo $row['IdPedido']?>" method="POST">
                    <div class="input-group">
                      <input type="number" class="form-control" name="Ntaxi" placeholder="#"  autocomplete="off" required>
                      <button type="submit" class="btn btn-danger" name="btnstatus"><?php echo $row['Ntaxi'];?></button>
                    </div>
                  </form>
                  <?php } ?>
                </td>
                <td><?php echo $row['Fecha']; ?></td>
                <td><?php echo $row['Nombre']; ?></td>
                <td>
                  <a href="updateadmin.php?IdPedido=<?php echo $row['IdPedido']?>" class="btn btn-secondary">
                      <i class="fas fa-marker"></i>
                  </a>
                  <a href="deleteadmin.php?IdPedido=<?php echo $row['IdPedido']?>" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                  </a>
                  <a href="modaladmin.php?IdPedido=<?php echo $row['IdPedido']?>" class="btn btn-primary">
                    Reportar
                  </a>
                </td>
                </tr>
              <?php
              }
            }
           } else {
          $query = "SELECT IdPedido, Telefono, Colonia, Calleynum, Entrecalle, Observacion, Fecha, Ntaxi, Nombre, estado FROM pedidos JOIN usuario ON pedidos.Usuario_IDUsuario = usuario.IDUsuario ORDER BY CASE WHEN pedidos.Ntaxi IS NULL THEN 0 ELSE 1 END, pedidos.estado ASC, pedidos.IdPedido DESC LIMIT 200";
          $pedidosinf = mysqli_query($mysql, $query);    

          while($row = mysqli_fetch_assoc($pedidosinf)) { ?>
          <tr>
            <td><?php echo $row['IdPedido']; ?></td>
            <td><?php echo $row['Telefono']; ?></td>
            <td><?php echo $row['Colonia']; ?></td>
            <td><?php echo $row['Calleynum']; ?></td>
            <td><?php echo $row['Entrecalle']; ?></td>
            <td><?php echo $row['Observacion']; ?></td>
            <td>
            <?php if ($row['Ntaxi'] >= 1) {  ?> 
                  <!-- TAXI agregado -->
                  <form action="statusadmin.php?IdPedido=<?php echo $row['IdPedido']?>" method="POST">
                    <div class="input-group">
                      <input type="number" name="Ntaxi" class="form-control" placeholder="#"  autocomplete="off" required>
                      <button type="submit" class="btn btn-success" name="btnstatus"><?php echo $row['Ntaxi'];?></button>
                    </div>
                  </form>
                  <?php } elseif ($row['Ntaxi'] == "00" || $row['Ntaxi'] == "C" || $row['Ntaxi'] == "c") { ?>
                  <!-- TAXI CANCELADO -->
                  <button type="button" class="btn btn-warning">
                    CANCELADO
                  </button> 
                  <?php }else {?>
                  <!-- agregado TAXI -->
                  <form action="statusadmin.php?IdPedido=<?php echo $row['IdPedido']?>" method="POST">
                    <div class="input-group">
                      <input type="number" class="form-control" name="Ntaxi" placeholder="#"  autocomplete="off" required>
                      <button type="submit" class="btn btn-danger" name="btnstatus"><?php echo $row['Ntaxi'];?></button>
                    </div>
                  </form>
                  <?php } ?>
            </td>
            <td><?php echo $row['Fecha']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td>
              <a href="updateadmin.php?IdPedido=<?php echo $row['IdPedido']?>" class="btn btn-secondary">
                  <i class="fas fa-marker"></i>
              </a>
              <a href="deleteadmin.php?IdPedido=<?php echo $row['IdPedido']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
              <a href="modaladmin.php?IdPedido=<?php echo $row['IdPedido']?>" class="btn btn-primary">
                Reportar
              </a>
            </td>
          </tr>
          <?php } 
          }?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('../partials/footeradmin.php'); ?>