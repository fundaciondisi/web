<?php
class misql
{

    var $conexion;
   	var $conexion_servidor;
    var $conexion_usuario;
	var $conexion_contrasena;
    var $conexion_bd;
    
    //Realizar conexion a la base de datos
    function Conectar()
    {
        $sqlpass = new sqlpass();
		$this->conexion= mysql_pconnect($sqlpass->conexion_servidor, $sqlpass->conexion_usuario, $sqlpass->conexion_contrasena);
        mysql_set_charset('utf8');
        mysql_select_db($sqlpass->conexion_bd, $this->conexion);
    }
    //Realizar consulta a la base de datos
    function Consulta($datos)
    {
		$sqlpass = new sqlpass();
		$this->conexion= mysql_pconnect($sqlpass->conexion_servidor, $sqlpass->conexion_usuario, $sqlpass->conexion_contrasena);
        mysql_set_charset('utf8');
        $resultado= mysql_query($datos, $this->conexion);
        
        return $resultado;
    }
    //Devolver resultado de un campo de consulta a la base de datos
    function Resultado($datos)
    {
        $resultado= mysql_result(mysql_query($datos), 0);
        
        return $resultado;
    }
    //Devolver array de datos de consulta a la base de datos
    function Farray($datos)
    {
        $resultado= mysql_fetch_array($datos);
        
        return $resultado;
    }
    //Devolver numero de filas de consulta a la base de datos
    function Filas($datos)
    {
        $resultado= mysql_num_rows(mysql_query($datos));   
        return $resultado;
    }
}

include_once(__ROOT__."config_bd.php");

$misql = new misql () ;

$sqlpass = new sqlpass();

if(!($conexion = mysql_pconnect($sqlpass->conexion_servidor,$sqlpass->conexion_usuario,$sqlpass->conexion_contrasena)))
{
	echo "Error en la conexión a la base de datos, intentelo otra vez";
}
if(!mysql_select_db($sqlpass->conexion_bd,$conexion))
{
	$consulta="create database ".$sqlpass->conexion_bd;
	$resultado = mysql_query($consulta,$conexion);
	if(!mysql_select_db($sqlpass->conexion_bd,$conexion))
	{
		echo "Error seleccionando la base de tados";
	}
}
mysql_set_charset('utf8');
?>
