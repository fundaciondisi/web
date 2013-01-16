<?php


function ordenar_consulta($consulta,$que)
{
	$misql = new misql () ;
	$resultado = $misql->Consulta($consulta);
	if($resultado)
		$num_sus=$misql->Filas($consulta);
	else
		$num_sus=0;
	for($a=0;$a<$num_sus;$a++)
	{
		$fila=$misql->Farray($resultado);
		$susc[$a]=$fila[$que];
	//	echo $susc[$a];
	}
	return $susc;
}

function existe_tabla($tabla)
{
	$misql = new misql () ;
	$resultado = $misql->Consulta("select count(*) from ".$tabla);
	if($num_sus=@$misql->Filas("select count(*) from ".$tabla))
		return TRUE;
	else
		return FALSE;
}

function autorizar_admin()
{
	if($_SESSION['nivel']==1)
	{
	}
	else
	{
		echo "no tiene autorización para entrar aquí";
		exit();
	}
}

function direccion()
{
	echo "<script>";
	echo "url = './';";
	echo "$(location).attr('href',url);";
	echo "</script>";
	
}

function index($index,$noindex,$sino)
{
	if($sino==1)
	{
		echo $index;
	}
	else
	{
		echo $noindex;
	}
}

function activarolverlay()
{
	echo "<script>
		$.easing.drop = function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
		};
	</script>
	<script>
	  $(document).ready(function() {
	      $('a[rel]').overlay();
	    });
	</script>";
}

function echooverlay_simple($num,$h,$w,$t,$l,$ptop,$pleft,$texto)
{
	echo "<script>$('#lego".$num."').click(function() {



		$('#lego".$num."').overlay({
			effect: '$num',
			mask: '#789'
		});
	});";
	
	echo "$.tools.overlay.addEffect('$num', function(css, done) { 

	   // use Overlay API to gain access to crucial elements
	   var conf = this.getConf(),
	       overlay = this.getOverlay();           

	   // determine initial position for the overlay
	
			css.top = $ptop;
	      css.left = $pleft;
	      css.position = 'absolute';
	
	//  if (conf.fixed)  {
	    //  css.position = 'fixed';
//	   } else {
	    //  css.top += $(window).scrollTop();
	     // css.left += $(window).scrollLeft();		  
//	   } 

	   // position the overlay and show it
	   overlay.css(css).show();

	   // begin animating with our custom easing
	   overlay.animate({ top: '-=".$t."',  opacity: 1,  width: '+=".$w."', height: '+=".$h."', left: '+=".$l."'}, 400, 'drop', done);

	   /* closing animation */
	   }, function(done) {
	      this.getOverlay().animate({top:'+=".$t."', opacity:0, width:'-=".$w."', height: '-=".$h."', left: '-=".$l."'}, 300, 'drop', function() {
	         $(this).hide();
	         done.call();      
	      });
	   }
	);</script>";
	
	
	echo "<div class='lego_overlay' id='mies".$num."' style='width:50px;height:50px;position:absolute;top:".$ptop."px;left:".$pleft."px;overflow:inherit'>";
	
		echo $texto;
		
		echo "</div>";
}

function nobarra($mensaje)
{		
		do{
			$pos1=strpos($mensaje, '/');
			$mensaje1=substr($mensaje,0,$pos1);
			$fin=strlen($mensaje);
			$mensaje2=substr($mensaje,$pos1+1,$fin);
			$mensaje=$mensaje1.$mensaje2;
			$pos1=strpos($mensaje, '/');
		}while($pos1!=false);
		return $mensaje;
}

function contarpalabras($mensaje,$num)
{
	if(count(explode(" ", $mensaje))<=$num)
	{
		return $mensaje;
	}
	else
	{
		$cont=0;
		$pos=0;
		$pos1=0;
		$mensaje1=$mensaje;
		while($cont<$num)
		{
			$pos=strpos($mensaje1,' ');
			$fin=strlen($mensaje1);
			$mensaje1=substr($mensaje1,$pos+1,$fin);
		//	echo $mensaje1."<br>";
			$cont++;
			$pos1=$pos1+$pos+1;
		}
		$mensaje=substr($mensaje,0,$pos1);
	//	$mensaje=quitarpalabra($mensaje,"y");
		return $mensaje;
	}
}

function quitarpalabra($mensaje,$palabra)
{
	if(explode($palabra,$mensaje))
	{
		$fin=strlen($mensaje);
		$long=strlen($palabra);
		$mensaje=substr($mensaje,0,$fin-$long-1);
	}
	
	return $mensaje;
}

function activarfotos()
{
	echo "<script type='text/javascript'>
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>
   	<style type='text/css'>
	#gallery {
		padding: 10px;
		width: 1000px;
	}
	</style>";
}

function f_fotos($ruta,$fotos)
{
	echo "<div id='gallery' style='width:920px'>";
	for($a=1;$a<=sizeof($fotos);$a++)
	{
		echo "<a href='".f_ruta().$ruta."/G".$fotos[$a]."' title=''>
            <img src='".f_ruta().$ruta."/".$fotos[$a]."'/>
        </a>";
	}
	echo "</div>";
}

function arrayfotos($resultado,$ruta)
{
	if($resultado)
	{
		activarfotos();
		$fotos=array();
		$num=mysql_num_rows($resultado);
		for($k=1;$k<=$num;$k++)
		{
			$fila=mysql_fetch_array($resultado);
			$fotos[$k]=$fila['nombre'];
		}
		
		f_fotos($ruta,$fotos);
	}
}

function tamfotos($resultado,$root,$ruta)
{
	if($resultado)
	{
		$image = new SimpleImage();
		
		$num=mysql_num_rows($resultado);
		for($k=0;$k<$num;$k++)
		{
			$fila=mysql_fetch_array($resultado);
			$name=$fila['nombre'];
			$fich=$root.$ruta."/".$name;
			if(!file_exists($fich))
			{
			   $image->load("G".$name);
			    $image->resizeToHeight(200);
			    $image->save($name); 
			}
		}
	} 
}

function tamfotosG($resultado,$root,$ruta)
{
	if($resultado)
	{
		$image = new SimpleImage();
		
		$num=mysql_num_rows($resultado);
		for($k=0;$k<$num;$k++)
		{
			$fila=mysql_fetch_array($resultado);
			$name=$fila['nombre'];
			$name="G".$name;
			$fich=$root.$ruta."/".$name;
			if(file_exists($fich))
			{
				$image->load($name);
				if($image->getWidth()>900)
				{
				    $image->resizeToWidth(900);
				}
				$image->save($name); 
			}
		}
	} 
}

function foto_todo($cat,$ruta,$root)
{
	$misql = new misql ();

	$consulta="select * from fotos where categoria='".$cat."'";
	
	$ruta=nobarra($ruta);
	
	$resultado=$misql->Consulta($consulta);
//	tamfotos($resultado,$root,$ruta);

	$resultado=$misql->Consulta($consulta);
//	tamfotosG($resultado,$root,$ruta);
	
	$resultado=$misql->Consulta($consulta);
	arrayfotos($resultado,$ruta);
}
?>