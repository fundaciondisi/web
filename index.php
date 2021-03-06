<?php
		
		define('__ROOT__',dirname(__FILE__)."/");

		ini_set('display_errors', 1);
		error_reporting(E_ALL);


		//$misql = new misql () ;

		include_once(__ROOT__."includes/conexion.php");
		include_once(__ROOT__."includes/ruta.php");
		include_once(__ROOT__."includes/funciones.php");
?>

<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>Fundación DISI</title>
		
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" media="all" href="css/style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->
		
		
		<!-- JS -->
		<script src="js/jquery-1.6.4.min.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/tabs.js"></script>
		
		<!-- Tweet -->
		<link rel="stylesheet" href="css/jquery.tweet.css" media="all"  /> 
		<script src="js/tweet/jquery.tweet.js" ></script> 
		<!-- ENDS Tweet -->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="css/superfish.css" /> 
		<script  src="js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script  src="js/superfish-1.4.8/js/superfish.js"></script>
		<script  src="js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->
		
		<!-- prettyPhoto -->
		<script  src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css"  media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- poshytip -->
		<link rel="stylesheet" href="js/poshytip-1.1/src/tip-twitter/tip-twitter.css"  />
		<link rel="stylesheet" href="js/poshytip-1.1/src/tip-yellowsimple/tip-yellowsimple.css"  />
		<script  src="js/poshytip-1.1/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300' rel='stylesheet' type='text/css'>
		
		<!-- Flex Slider -->
		<link rel="stylesheet" href="css/flexslider.css" >
		<script src="js/jquery.flexslider-min.js"></script>
		<!-- ENDS Flex Slider -->
		
		<!-- Less framework -->
		<link rel="stylesheet" media="all" href="css/lessframework.css"/>
		
		<!-- modernizr -->
		<script src="js/modernizr.js"></script>
		
		<!-- SKIN -->
		<link rel="stylesheet" media="all" href="css/skin.css"/>
		

	</head>
	
	<body lang="es">
			
		<?php include_once(__ROOT__."c_index/cabecera.php"); ?>

		<!-- MAIN -->
		<div id="main">	
			<div class="wrapper">

				<!-- slider holder -->
				<div id="slider-holder" class="clearfix">
					
					<!-- slider -->
			        <div class="flexslider home-slider">
					  <ul class="slides">
					    <li>
					      <img src="img/slides/01.jpg" alt="alt text" />
					    </li>
					    <li>
					      <img src="img/slides/02.jpg" alt="alt text" />
					      <p class="flex-caption">Pellentesque habitant morbi  feugiat vitae.</p>
					    </li>
					    <li>
					      <img src="img/slides/03.jpg" alt="alt text" />
					    </li>
					  </ul>
					</div>
		        	<!-- ENDS slider -->
		        	
		        	<div class="home-slider-clearfix "></div>
		        	
		        	<!-- Headline -->
		        	<div id="headline">
		        		<img src="<?php echo f_ruta();?>img/cab.png">
		        	</div>
		        	<!-- ENDS headline -->
		        	
		        	
				</div>
				<!-- ENDS slider holder -->
				
				
				<!-- home-block -->
	        	<div class="home-block" >
	        		<h2 class="home-block-heading"><span>FEATURED POSTS</span></h2>
	        		<div class="one-third-thumbs clearfix" >

	        			<?php 
		        			if(existe_tabla("cuadrodinamico")==FALSE)
							{
								$consulta="create table cuadrodinamico (nombre varchar(100) primary key not null, posicion int(2) not null, texto varchar(20000))";
								$resultado = mysql_query($consulta,$conexion);
							}
						?>

						<?php

							$consulta="select * from cuadrodinamico order by posicion";
							$resultado=mysql_query($consulta,$conexion);
							if($resultado):

								$num=mysql_num_rows($resultado);
								for($k=1;$k<=$num;$k++)
								{
									$fila=mysql_fetch_array($resultado); ?>

		        		<figure <?php if(($k%3)==0){echo 'class="last"';}?>>

		        			<figcaption>
	        					<?php echo $fila['texto']; ?>
			        		</figcaption>
			        		
			        		<a href="single.html"  class="thumb"><img src="img/dummies/featured-2.jpg" alt="Alt text" /></a>
		        		</figure>
		        			<?php
		        				}
		        				endif;
		        			?>
		        		
	        		</div>
	        	</div>
	        	<!-- ENDS home-block -->
	        	
	        	
	        	<!-- home-block -->
	        	<div class="home-block">
	        		<h2 class="home-block-heading"><span>LATEST PROJECTS</span></h2>
	        		<div class="one-fourth-thumbs clearfix">
	        			
	        			
	        			<figure>
		        			<figcaption>
	        					<strong>Pellentesque habitant morbi</strong>
	        					<span>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</span>
	        					<em>December 08, 2011</em>
	        					<a href="single.html" class="opener"></a>
			        		</figcaption>
			        		
			        		<a href="single.html"  class="thumb"><img src="img/dummies/featured-7.jpg" alt="Alt text" /></a>
		        		</figure>
		        		
		        		<figure>
		        			<figcaption>
	        					<strong>Pellentesque habitant morbi</strong>
	        					<span>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</span>
	        					<em>December 08, 2011</em>
	        					<a href="single.html" class="opener"></a>
			        		</figcaption>
			        		
			        		<a href="single.html"  class="thumb"><img src="img/dummies/featured-8.jpg" alt="Alt text" /></a>
		        		</figure>
		        		
		        		<figure>
		        			<figcaption>
	        					<strong>Pellentesque habitant morbi</strong>
	        					<span>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</span>
	        					<em>December 08, 2011</em>
	        					<a href="single.html" class="opener"></a>
			        		</figcaption>
			        		
			        		<a href="single.html"  class="thumb"><img src="img/dummies/featured-9.jpg" alt="Alt text" /></a>
		        		</figure>
		        		
		        		<figure class="last">
		        			<figcaption>
	        					<strong>Pellentesque habitant morbi</strong>
	        					<span>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</span>
	        					<em>December 08, 2011</em>
	        					<a href="single.html" class="opener"></a>
			        		</figcaption>
			        		
			        		<a href="single.html"  class="thumb"><img src="img/dummies/featured-10.jpg" alt="Alt text" /></a>
		        		</figure>
		        		
		        		<a href="#" class="more-link right">More projects  &#8594;</a>
		        		
		        		
		        		
	        		</div>
	        		
	        		
	        	</div>
	        	<!-- ENDS home-block -->
	        		        	
			</div>
		</div>
		<!-- ENDS MAIN -->
		
		
		<footer>
			<div class="wrapper">
			
				<ul  class="widget-cols clearfix">
					<li class="first-col">
						
						<div class="widget-block">
							<h4>Recent posts</h4>
							<div class="recent-post">
								<a href="#" class="thumb"><img src="img/dummies/54x54.gif" alt="Post" /></a>
								<div class="post-head">
									<a href="#">Pellentesque habitant morbi senectus</a><span> March 12, 2011</span>
								</div>
							</div>
							<div class="recent-post">
								<a href="#" class="thumb"><img src="img/dummies/54x54.gif" alt="Post" /></a>
								<div class="post-head">
									<a href="#">Pellentesque habitant morbi senectus</a><span> March 12, 2011</span>
								</div>
							</div>
							<div class="recent-post">
								<a href="#" class="thumb"><img src="img/dummies/54x54.gif" alt="Post" /></a>
								<div class="post-head">
									<a href="#">Pellentesque habitant morbi senectus</a><span> March 12, 2011</span>
								</div>
							</div>
						</div>
					</li>
					
					<li class="second-col">
						
						<div class="widget-block">
							<h4>Zeni Template</h4>
							<p>Hope you find this template useful you are free to use it on personal and commercial projects. See the full license at this <a href="http://luiszuno.com/blog/license" >link</a></p>
						</div>
						
					</li>
					
					<li class="third-col">
						
						<div class="widget-block">
							<div id="tweets" class="footer-col tweet">
		         				<h4>Twitter widget</h4>
		         			</div>
		         		</div>
		         		
					</li>
					
					<li class="fourth-col">
						
						<div class="widget-block">
							<h4>Placeholder images</h4>
							<p>Thanks to <a href="http://www.thebeaststudio.com/" >Moe Pike</a> for sharing his work as place holder images for this preview. Visit his <a href="http://www.thebeaststudio.com/" >website</a> and find more of his awesome work.</p>
						</div>
		         		
					</li>	
				</ul>				
				
				
				<div class="footer-bottom">
					<div class="left">Created by <a href="http://www.luiszuno.com" >luiszuno.com</a></div>
					<div class="right">
						<ul id="social-bar">
							<li><a href="http://www.facebook.com/pages/Ansimuz/224538697564461"  title="Become a fan" class="poshytip"><img src="img/social/facebook.png"  alt="Facebook" /></a></li>
							<li><a href="https://twitter.com/ansimuz" title="Follow my tweets" class="poshytip"><img src="img/social/twitter.png"  alt="twitter" /></a></li>
							<li><a href="https://plus.google.com/109030791898417339180/posts"  title="Add to the circle" class="poshytip"><img src="img/social/plus.png" alt="Google plus" /></a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</footer>
					
	</body>
	
</html>