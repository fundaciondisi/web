<?php
@session_start();

if(@empty($_GET['des'])==0||@$_GET['des']==1)
{
	session_unset();
	session_destroy();
	$_SESSION['estado'] = NULL;
	$_SESSION['login'] = NULL;
}

//$misql = new misql () ;

include_once(__ROOT__."includes/conexion.php");


// logearse
if(empty($_POST['login'])==0&&empty($_POST['pass'])==0)
{
	$login = $_POST['login'];
	$pass = $_POST['pass'];	
//	echo $login.$pass;
	$consulta = "select * from usuarios where login='".$login."' and password=sha1('".$pass."')";
//	echo sha1($pass);
	$resultado = mysql_query($consulta,$conexion);
	$v_login = mysql_num_rows($resultado);
	if($v_login==1)
	{
		$_SESSION['estado'] = "conectado";
		$_SESSION['login'] = $login;
		$fila=mysql_fetch_array($resultado);
		$_SESSION['nivel'] = $fila['nivel'];
		$_SESSION['sid']=$fila['id'];
	}
	else
	{
		$login = NULL;
		$pass = NULL;	
	}
}
else
{
	$login = NULL;
	$pass = NULL;	
}



include_once(__ROOT__."c_index/meta.php");
echo $meta;

include_once(__ROOT__."c_index/cssjs.php");
?>
</head>
