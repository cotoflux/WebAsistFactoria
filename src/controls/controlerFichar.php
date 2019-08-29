<?php
include '../models/Connect.php';
$conexion = new Connect();
$con = $conexion->connectBD();



if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
{   
    session_start();
    $hora = date("H:i:sa");
    echo $hora;
    $fecha = date("Y-m-d");
    echo $fecha;
    $idUsuario = $_SESSION['identi'];
    echo $idUsuario;
    $meteo=1;

    ficharADDBB($con,$fecha,$hora,$idUsuario,$meteo);
}

function ficharADDBB($conn,$fecha,$hora,$idUsuario,$meteo){
    echo "ss";
        $sql= "INSERT INTO attendance (id_user,date,time,meteo) VALUES(2,'2019-08-29','16:15:22',1)";
        echo "a";
        $result = mysqli_query($conn,$sql);
}