<?php

include("database.php");

if(isset($_GET['idCruce'])) {
  $idCruce = $_GET['idCruce'];
  $querydel = "DELETE FROM cruces WHERE idCruce=$idCruce";
  $result = mysqli_query($mysql, $querydel);
  if(!$result) {
    die("Query Failed.");
  }

?>
    <script type="text/javascript">window.location.href = 'cruce.php';</script>
<?php 
}

?>