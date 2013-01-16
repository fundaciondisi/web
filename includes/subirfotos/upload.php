<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
define('__ROOT__',dirname(dirname(dirname(__FILE__)))."/");
// We're putting all our files in a directory called images.
$uploaddir = __ROOT__.$_POST['categoria'].'/';
//$uploaddir = __ROOT__."imagenes/";

// The posted data, for reference
$file = $_POST['value'];
$name = $_POST['name'];

// Get the mime
$getMime = explode('.', $name);
$mime = end($getMime);

// Separate out the data
$data = explode(',', $file);

// Encode it correctly
$encodedData = str_replace(' ','+',$data[1]);
$decodedData = base64_decode($encodedData);

// You can use the name given, or create a random name.
// We will create a random name!

//$randomName = substr_replace(sha1(microtime(true)), '', 12).'.'.$mime;

include_once(__ROOT__."includes/conexion.php");

if(file_put_contents($uploaddir."G".$name, $decodedData)) 
{
	echo $randomName.":uploaded successfully";
	$resultado=$misql->Consulta("insert into fotos values ('".$name."','".$_POST['categoria']."')");
}
else {
	// Show an error message should something go wrong.
	echo "Something went wrong. Check that the file isn't corrupted";
}


?>