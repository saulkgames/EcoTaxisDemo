<?php

include('database.php');

if (isset($_POST['create'])) {
  $Usuario = $_POST['Usuario'];
  $Password = $_POST['Password'];
  $Nombre = $_POST['Nombre'];
  $Rol = $_POST['Rol'];

  $query = "INSERT INTO usuario(Usuario, Password, Nombre, Rol) 
  VALUES ('$Usuario', '$Password', '$Nombre', '$Rol')";
  $result = mysqli_query($mysql, $query);
  if(!$result) {
    die("Query Failed.");
  }
    $_SESSION['message']='Usuario guardado correctamente'; 
    $_SESSION['message_type']='success'; 
?>
    <script type="text/javascript">window.location.href = 'signup.php';</script>
<?php 
}

?>