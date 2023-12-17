<?php   
    session_start();
    include('Conexion.php');

    if (isset($_POST['Usuario']) && isset($_POST['Clave']) ) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validate($_POST['Usuario']); 
    $Clave = validate($_POST['Clave']);

    if (empty($Usuario)) {
?>
        <script type="text/javascript">window.location.href = 'login.php?error=El Usuario Es Requerido';</script>
<?php
    }elseif (empty($Clave)) {
?>
        <script type="text/javascript">window.location.href = 'login.php?error=La clave Es Requerida';</script>
<?php
    }else{

        // $Clave = md5($Clave);

        $Sql = "SELECT * FROM usuario WHERE Usuario = '$Usuario' AND Password = '$Clave'";
        $result = mysqli_query($conexion, $Sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['Usuario'] === $Usuario && $row['Password'] === $Clave) {
                echo $_SESSION['Usuario'] = $row['Usuario'];
                echo $_SESSION['Nombre_Completo'] = $row['Nombre'];
                echo $_SESSION['Id'] = $row['IDUsuario'];
                $_SESSION['Rol'] = $row['Rol'];
                
                if($_SESSION['Rol'] === "Administrador"){
?>
                    <script type="text/javascript">window.location.href = 'indexadmin.php';</script>
<?php
                }else{

?>                     
                    <script type="text/javascript">window.location.href = 'index.php';</script>
<?php
                }
                   
            }else {
?>
                <script type="text/javascript">window.location.href = 'login.php?error=El usuario o la clave son incorrectas';</script>
<?php
            }

        }else {
?>
            <script type="text/javascript">window.location.href = 'login.php?error=El usuario o la clave son incorrectas';</script>
<?php
        }
    }

} else {
?>
    <script type="text/javascript">window.location.href = 'login.php';</script>
<?php 
}
?>