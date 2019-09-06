<?php
include '../models/Connect.php';
$conexion = new Connect();
$con = $conexion->connectBD();



if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
{   
    session_start();
    $hora = date("H:i:sa");
    $_SESSION['fecha']=$hora;
    echo $_SESSION['fecha'];
    echo $hora;
    $fecha = date("Y-m-d");
    echo $fecha;
    $idUsuario = $_SESSION['identi'];
    echo $idUsuario;
    $meteo=1;

    ficharADDBB($con,$fecha,$hora,$idUsuario,$meteo);
}

function ficharADDBB($conn,$fecha,$hora,$idUsuario,$meteo){
  
        $sql= "INSERT INTO attendance (id_user,date,time,meteo) VALUES($idUsuario,CURDATE(),CURTIME(),1)";
        $result = mysqli_query($conn,$sql);
        header("Location: ../views/viewUserProfile.php");
}