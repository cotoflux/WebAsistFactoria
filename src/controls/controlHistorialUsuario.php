<?php
session_start();
include "../models/Connect.php";

$connexion = new Connect();
$con = $connexion->connectBD();
$idUser = $_SESSION['identi'];

//mostrarHistorialUsuario($con,$idUser);

function mostrarHistorialUsuario($con,$idUser)
{  
    $redirectUrl = '../views/viewPersonalUserHistory.php';
    $sql = "SELECT u.id, u.name, a.date, a.time 
    FROM users u join attendance a on(u.id = a.id_user)
    WHERE u.id = $idUser";

    echo $idUser;

    $result = mysqli_query($con,$sql);
    $_SESSION['historial']=$result;
    if (!$result){
        echo "no se ejecuta";
    }
    while ($fila = mysqli_fetch_array($result)) {
        echo $fila['id']."--".$fila['name']."--".$fila['date']."--".$fila['time']."<br/>";
    }
    
}
