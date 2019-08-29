<?php
include_once "../models/Connect.php";
$conexion = new Connect();
$con= $conexion->connectBD();
$student = $_POST["user"];
$student_pass = $_POST ["pass"];

$infoPersona = devuelveInfoPersonal($con, $student, $student_pass);


function devuelveInfoPersonal($con, $student, $student_pass)
{
    $sqlSentence = "SELECT * FROM users WHERE username = '$student' AND password ='$student_pass'";
    $result=mysqli_query($con, $sqlSentence);
    /* if(!($result)){
        header("Location: ../views/viewLogin.html");
    } */

    $a=array();
    foreach($result as $value){
        echo "<br/>".$value['id'];
        echo "<br/>".$value['name'];
        echo "<br/>".$value['last_name'];
        echo "<br/>".$value['username'];
        echo "<br/>".$value['password'];
        echo "<br/>".$value['id_rol'];
        echo "<br/>".$value['id_schedule'];
        $a['id'] = $value['id'];
        $a['name'] = $value['name'];
        $a['id_schedule'] = $value['id_schedule'];
        //array_push($a,$value['id_schedule']);
        $idRol = $value['id_rol'];
        echo "adasdsad".$idRol; 
    }   
    
    $redirectUrl = '../views/viewUserProfile.php';
    if($idRol==2)
    {
        $redirectUrl = '../views/viewAdmini.php';
    }
    
    session_start();
    
        $_SESSION['identi'] = $a['id'];
        $_SESSION['user'] = $a['name'];
        $_SESSION['horario'] = $a['id_schedule'];

    header("Location: $redirectUrl");        
}







/* if($sqlSentence){
foreach ($connection->query($sqlSentence) as $row) {
   if($row['PASSWORD']==$student_pass && $row['username']==$student){
   print "<br>".$row['username'] . "\t";
   print $row['PASSWORD'] . "<br>";
   header("Location: userWindow.html");
       $_SESSION['user']=$row['username'];
       $_SESSION['pass']=$row['PASSWORD'];
   exit;
   }
 }
}*/