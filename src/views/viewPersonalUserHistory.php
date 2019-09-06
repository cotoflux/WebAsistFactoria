<?php
include "../controls/controlHistorialUsuario.php";
$_SESSION['student']=array();
$a="hola";
$b="adios";
array_push($_SESSION['student'],$a,$b);  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/profileUserHistory.css">
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
    <title>User Window</title>
</head>

<body>
    <header>
        <div class="logo">
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="">Contacto</a></li>
                <li><a href="">Idioma</a></li>
                <li><a href="">Seguridad</a></li>
                <li><a href="">FAQ</a></li>
            </ul>
        </nav>
    </header>
    <main>
       <table>
           <tr>
            <th>Nombre</td>
            <th>Dia</td> 
            <th>Hora</td>
           </tr>
           <tr>
           <?php 
           $result =  $_SESSION['historial'];
           while ($fila = mysqli_fetch_array($result)) {
            echo "<td>".$fila['id']."</td>";
        }
    ?>
           </tr>
       </table>

    </main>
    <footer>
        <div class="bottom-info">
            <p>@2019 <span>Spicy Banana</span> from <span>FactoriaF5.</span></p>
            <?php
             for($i = 0 ; $i < count($_SESSION['student']) ; $i++) {
                echo $_SESSION['student'][$i];
                } 
            ?>
        </div>
    </footer>
</body>

</html>