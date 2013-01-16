	<header class="clearfix">
		
			<!-- top widget -->
			<div id="top-widget-holder">
				<div class="wrapper">
					<div id="top-widget">
						<div class="padding">
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
										<h4>Dummy text</h4>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies ege. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada.</p>
									</div>
									
								</li>
								
								<li class="third-col">
									
									<div class="widget-block">
										<h4>Dummy text</h4>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies ege. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada.</p>
									</div>
					         		
								</li>
								
								<li class="fourth-col">
									
									<div class="widget-block">
										<h4>Dummy text</h4>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies ege. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada.</p>
									</div>
					         		
								</li>	
							</ul>				
						</div>
					</div>
				</div>
				
			</div>
			<!-- ENDS top-widget -->
		
			<?php
			//comprueba y si no crea la tabla para el menú
			if(existe_tabla("menu")==FALSE)
			{
				$consulta="create table menu (nombre varchar(100) primary key not null,apodo varchar(30) not null, posicion int(2) not null)";
				$resultado = mysql_query($consulta,$conexion);
			}

			if(existe_tabla("submenu")==FALSE)
			{
				$consulta="create table submenu (menu varchar(30) not null, nombre varchar(100) primary key not null,apodo varchar(30) not null, posicion int(2) not null)";
				$resultado = mysql_query($consulta,$conexion);
			}
			?>


			<div class="wrapper clearfix">
				<a href="#" id="top-open">Fundación DISI</a>
				<nav>
					<ul id="nav" class="sf-menu">
						<li class="current-menu-item"><a href="index.html">Inicio</a></li>

						<?php
								//menú principal 
								$consulta="select * from menu order by posicion";
								$resultado=mysql_query($consulta,$conexion);
								if($resultado)
								{
									$num=mysql_num_rows($resultado);
									for($k=0;$k<$num;$k++)
									{
										$fila=mysql_fetch_array($resultado);
										$enombre[$k]=$fila['nombre'];
										$eapodo[$k]=$fila['apodo'];
										echo "<li><a href='".f_ruta()."$eapodo[$k]/'>".$enombre[$k]."</a>";
										//submenus
										$consulta="select * from submenu where menu='".$eapodo[$k]."' order by posicion";

										$resultado2=mysql_query($consulta,$conexion);
										if($resultado2)
										{	
											echo "<ul>";
											$num2=mysql_num_rows($resultado2);
											for($j=0;$j<$num2;$j++)
											{
												$fila2=mysql_fetch_array($resultado2);
												$snombre[$j]=$fila2['nombre'];
												$sapodo[$j]=$fila2['apodo'];
												echo "<li><a href='".f_ruta()."$sapodo[$j]/'>".$snombre[$j]."</a></li>";
											}
											echo "</ul>";
										}

										echo "</li>";
									}
								}
						?>
				<!--		<li><a href="blog.html">BLOG</a></li>
						<li><a href="page.html">ABOUT</a>
							<ul>
								<li><a href="#">Submenu</a></li>
								<li><a href="#">Submenu</a></li>
								<li><a href="#">Submenu</a></li>
							
							</ul>
						</li>
						<li><a href="portfolio.html">WORK</a></li>
						<li><a href="contact.html">CONTACT</a></li>
						<li><a href="http://www.mojo-themes.com/item/zeni-wordpress-theme/?r=ansimuz">WORDPRESS VERSION</a></li>-->
					</ul>
					<div id="combo-holder"></div>
				</nav>
			</div>
		</header>