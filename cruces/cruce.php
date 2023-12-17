<?php include("../partials/header.php")?>
<?php include("database.php"); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->
 

      <div class="card card-body">
        <form action="" method="GET">
          <div class="form-group">
            <div class="input-group">
            <input type="search" name="origen" class="form-control" placeholder="Lugar de Inicio"> 
            <input type="search" name="destino" class="form-control" placeholder="Lugar de Destino"> 
            </div>
            <br>
            <input type="submit" name="buscar" class="btn btn-success btn-block" value="Buscar">
          </div>
        </form>
      </div>


      <div class="card card-body">
        <form action="createadmin.php" method="POST">
          <div class="form-group">
            <h3 name="idped">Cruces</h3>
          </div>
          <div class="form-group">
            <input type="text" name="Origen" class="form-control" placeholder="Punto de Origen" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Destino" class="form-control" placeholder="Destino">
          </div>
          <div class="form-group">
            <input type="text" name="Tarifa" class="form-control" placeholder="Tarifa">
          </div>
          <input type="submit" name="create" class="btn btn-success btn-block" value="Agregar Cruce">
        </form>
      </div>
      </div>
      <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Punto de origen</th>
            <th>Destino</th>
            <th>Tarifa</th>
          </tr>
        </thead>
        <tbody>

        <?php
            if(isset($_GET['buscar'])) {
              $BOrigen = $_GET['origen'];
              $BDestino = $_GET['destino'];
              $querysearch = "SELECT * FROM cruces WHERE Origen LIKE '%".$BOrigen."%' AND Destino LIKE '%".$BDestino."%' ORDER BY Origen ASC";
              $sear = mysqli_query($mysql, $querysearch);
              if($sear -> num_rows > 0) {
              while($row1 = mysqli_fetch_assoc($sear)) { ?>
                <tr>
                  <td><?php echo $row1['Origen']; ?></td>
                  <td><?php echo $row1['Destino']; ?></td>
                  <td><?php echo $row1['Tarifa']; ?></td>
 
                </tr>
              <?php
              }
            }
           } else {
            
          $querycru = "SELECT * FROM cruces ORDER BY Origen ASC";
          $pedidosinf = mysqli_query($mysql, $querycru);    

          while($row = mysqli_fetch_assoc($pedidosinf)) { ?>
          <tr>
            <td><?php echo $row['Origen']; ?></td>
            <td><?php echo $row['Destino']; ?></td>
            <td><?php echo $row['Tarifa']; ?></td>
            <td>
              <a href="update.php?idCruce=<?php echo $row['idCruce']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?idCruce=<?php echo $row['idCruce']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php }
        } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('../partials/footer.php'); ?>