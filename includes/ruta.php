<?php
function f_ruta() //función para dar la ruta absoluta incluyendo el nombre del host
{
	if(strpos($_SERVER['HTTP_HOST'],'www'))
	{
		$ruta="http://".$_SERVER['HTTP_HOST']."/";
	}
	else
	{
		$ruta=substr(dirname(__FILE__),strlen($_SERVER['DOCUMENT_ROOT']),strlen(dirname(__FILE__)));
	//	echo $ruta;
		$ruta=substr($ruta,1,strlen($ruta));
		if(strpos($ruta,'/'))
		{
			$ruta=substr($ruta,0,strpos($ruta,'/'))."/";
		}
		$ruta="http://".$_SERVER['HTTP_HOST']."/".$ruta;	
	}
	return $ruta;
}
?>