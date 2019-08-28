<?php
class Connect
{
    private $server = "localhost";
    private $user = "enric";
    private $password = "senglanot1";
    private $database = "wheel";
    private $chartset = "utf-8";
    private $conector;


    function connectBD()
    {
        $this->conector=new mysqli($this->server,$this->user,$this->password,$this->database);
        mysqli_query($this->conector,'SET NAMES "'.$this->chartset.'"');

        $response = "Conexiòn Exitosa";
        if($this->conector->connect_error)
        {
            $response = $this->conector->connect_error;
        }
        // echo $response;
        return $this->conector;

    }
    function listaUsuarios($manu)
    {
        $lista="SELECT id FROM usuarios WHERE estado=0";
        $result=mysqli_query($manu, $lista);
        $a=array();
        foreach($result as $value){
            // echo "<br/>".$value['id'];
            $a[]=$value['id'];
        }
       // return $result;
       return $a;
    }

    function matarUsuario($lista)
    {
        //$currentList = count($lista);
        //echo "<br/>----->".$currentList;
        $indiceMatar = array_rand($lista);
        //echo  "<br/>----->".$lista[$indiceMatar];
        $muerto = $lista[$indiceMatar];
        return $muerto;

    }

    function cambioEstado($idAModificar, $con)
    {
       

        $sql="UPDATE usuarios  
        SET estado = 1
        WHERE id = $idAModificar";
        $result=mysqli_query($con,$sql);

        /* echo "b";

        $sql2= "SELECT id,estado FROM usuarios WHERE estado=1";
        $result2 = mysqli_query($con,$sql2);
        foreach($result2 as $value){
            echo "<br/>id-->".$value['id'];
            echo "<br/>estado-->".$value['estado'];

        } */


    }
    function mostrarMuerto($id,$con)
    {
        $sql="SELECT nombre FROM usuarios WHERE id=$id";
        $nombre = mysqli_query($con,$sql);
        $guardarNombre;
        foreach($nombre as $value)
        {
            $guardarNombre=$value['nombre']; 
        }
        return $guardarNombre;
    }

    function reset($con)
    {
        $sql= "UPDATE usuarios  
        SET estado = 0";
        $result=mysqli_query($con,$sql);
       /*  $sql2= "SELECT * FROM usuarios WHERE estado=0";
        $resultado2=mysqli_query($con,$sql2);
        foreach($resultado2 as $value)
        {
            echo "<br/>id-->".$value['id'];
            echo "<br/>nombre".$value['nombre']; 
            echo "<br/>estado-->".$value['estado'];
        } */
    }
}
//Instancia Obj
 $conexion = new Connect();

 $con = $conexion->connectBD();
$listaId=$conexion->listaUsuarios($con);
$idUsuario = $conexion->matarUsuario($listaId);
$nombreMuerto=$conexion->mostrarMuerto($idUsuario,$con);
$conexion->cambioEstado($idUsuario,$con);
$conexion->reset($con);
//echo "<br/> Random entre 5 y 15-->".rand(5,15); 


?>