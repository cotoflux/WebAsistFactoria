<?php

include "controlLogin.php";


$infoPersona = devuelveInfoPersonal($con, $student, $student_pass);

foreach($infoPersona as $value)
{
    echo "<br/>".$value['id'];
    echo "<br/>".$value['name'];
    echo "<br/>".$value['id_schedule'];
}