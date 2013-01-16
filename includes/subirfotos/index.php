<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

$index=0;
define('__ROOT__',dirname(dirname(dirname(__FILE__)))."/");

include_once(__ROOT__."includes/funciones.php");
//$ruta=dirname(__FILE__);
//$ruta=nobarra($ruta);
$ruta=$_GET['trabajos'];
include_once(__ROOT__."index/cab.php");
include_once(__ROOT__."index/menunoindex.php");
?>

<?php
autorizar_admin();

if(existe_tabla("fotos")==FALSE)
{
	$consulta="CREATE TABLE `fotos` (
	  `nombre` varchar(100) NOT NULL,
	  `categoria` varchar(10) NOT NULL,
	  PRIMARY KEY (`nombre`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$resultado = mysql_query($consulta,$conexion);
}
?>
<script src="javascript.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />

	<div id="drop-files" ondragover="return false">
		Arrastra las fotos aquí
	</div>
	
	<div id="uploaded-holder">
		<div id="dropped-files">
			<div id="upload-button">
				<a href="#" class="upload">Upload!</a>
				<a href="#" class="delete">delete</a>
				<span>0 Files</span>
			</div>
		</div>
		<div id="extra-files">
			<div class="number">
				0
			</div>
			<div id="file-list">
				<ul></ul>
			</div>
		</div>
	</div>
	
<!--	<div id="loading">
		<div id="loading-bar">
			<div class="loading-color"> </div>
		</div>
		<div id="loading-content">Uploading file.jpg</div>
	</div>
	
	<div id="file-name-holder">
		<ul id="uploaded-files">
			<h1>Uploaded Files</h1>
		</ul>
	</div> -->
	
</div>
<?php
include_once(__ROOT__."index/foot.php");
?>
