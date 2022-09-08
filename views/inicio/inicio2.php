  <!--Main Navigation-->
  <header>


  	<!-- Carousel wrapper -->
  	<div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
  		<!-- Indicators -->
  		<ol class="carousel-indicators">
  			<li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
  			<li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
  			<li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
  		</ol>

  		<!-- Inner -->
  		<div class="carousel-inner">
  			<!-- Single item -->
  			<div class="carousel-item active">
  				<div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
  					<div class="d-flex justify-content-center align-items-center h-100">
  						<div class="text-white text-center">
  							<h1 class="mb-3">¡Una gran variedad de cursos y talleres!</h1>
  							<h5 class="mb-4">¡Inscribase ahora!</h5>
  							<a class="btn btn-outline-light btn-lg m-2" href="/centro_comunitario/panel/tallerInv.php" role="button" rel="nofollow" target="_blank">Inscribirse a cursos</a>
  							<a class="btn btn-outline-light btn-lg m-2" href="/centro_comunitario/panel/eventoInv.php" target="_blank" role="button">Inscribirse a eventos</a>
  						</div>
  					</div>
  				</div>
  			</div>

  			<!-- Single item -->
  			<div class="carousel-item">
  				<div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
  					<div class="d-flex justify-content-center align-items-center h-100">
  						<div class="text-white text-center">
  							<h2>You can place here any content</h2>
  						</div>
  					</div>
  				</div>
  			</div>

  			<!-- Single item -->
  			<div class="carousel-item">
  				<div class="mask" style="
                background: linear-gradient(
                  45deg,
                  rgba(29, 236, 197, 0.7),
                  rgba(91, 14, 214, 0.7) 100%
                );
              ">
  					<div class="d-flex justify-content-center align-items-center h-100">
  						<div class="text-white text-center">
  							<h2>And cover it with any mask</h2>
  							<a class="btn btn-outline-light btn-lg m-2" href="https://mdbootstrap.com/docs/standard/content-styles/masks/" target="_blank" role="button">Learn about masks</a>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  		<!-- Inner -->

  		<!-- Controls -->
  		<a class="carousel-control-prev" href="#introCarousel" role="button" data-mdb-slide="prev">
  			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
  			<span class="sr-only">Previous</span>
  		</a>
  		<a class="carousel-control-next" href="#introCarousel" role="button" data-mdb-slide="next">
  			<span class="carousel-control-next-icon" aria-hidden="true"></span>
  			<span class="sr-only">Next</span>
  		</a>
  	</div>
  	<!-- Carousel wrapper -->
  </header>
  <!--Main Navigation-->

  <!--Main layout-->

  <div>
  	<section class="portfolio-block photography">
  		<div class="container-fluid">
  			<h1 style="text-align: center; padding: 1%;">
  				¡Nuestras instalaciones!
  			</h1>
  		</div>
  		<div class="container">
  			<div class="row g-0">
  				<div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img alt="..." style="height:250px; width: 432px;" class="img-fluid image" src="/centro_comunitario/image/proyecto/inst1.jpg" /></a></div>
  				<div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img alt="..." style="height:250px; width: 432px;" class="img-fluid image" src="/centro_comunitario/image/proyecto/inst2.jpg" /></a></div>
  				<div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img alt="..." style="height:250px; width: 432px;" class="img-fluid image" src="/centro_comunitario/image/proyecto/inst3.jpg" /></a></div>
  			</div>
  		</div>
  	</section>
  </div>

  <main class="mt-5">
  	<div class="container">
  		<!--Section: Content-->
  		<section>
  			<div class="row">
  				<div class="col-md-6 gx-5 mb-4">
  					<div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
  						<img alt="..." src="/centro_comunitario/image/proyecto/libreria.jpg" class="img-fluid" style="width: 612px; height: 300px;" />
  						<a href="#!">
  							<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
  						</a>
  					</div>
  				</div>

  				<div class="col-md-6 gx-5 mb-4">
  					<h4><strong>¡Una enorme variedad de libros!</strong></h4>
  					<p class="text-muted">
  						Contamos con una basta cantidad de libros de todos los géneros, puedes solicitarlos
  						creando una cuenta y asistir al centro comunitario para recogerlo ¡Es gratis!
  					</p>
  					<p><strong>Generos literarios:</strong></p>
  					<p class="text-muted">
  						1. Novelas <br>
  						2. Relatos <br>
  						3. Ensayos <br>
  						4. Poesías
  					</p>
  				</div>
  			</div>
  		</section>
  		<!--Section: Content-->

  		<hr class="my-5" />

  		<!--Section: Content-->
  		<section class="text-center">
  			<h4 class="mb-5"><strong>Eventos próximos</strong></h4>

  			<div class="row">


  				<?php
					foreach ($datosevento as $key => $dato) :
					?>

  					<div class="col-lg-4 col-md-6 mb-4">
  						<div class="card">
  							<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
  								<img alt="..." style="height: 276px; width: 416px;" src="../image/evento/<?php echo $dato['fotografia'] ?>" class="img-fluid" />
  								<a href="#!">
  									<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
  								</a>
  							</div>
  							<div class="card-body">
  								<h5 class="card-title"><?php echo $dato['evento'] ?></h5>
  								<p class="card-text">
  									<?php echo $dato['descripcion'] ?>
  								</p>
  								<a href="../panel/registro.php" class="btn btn-primary">Ver mas</a>
  							</div>
  						</div>
  					</div>

  				<?php
					endforeach
					?>

  				<hr class="my-5" />
  				<h4 class="mb-5"><strong>Talleres</strong></h4>

  				<?php
					foreach ($datos as $key => $dato) :
					?>

  					<div class="col-lg-4 col-md-6 mb-4">
  						<div class="card">
  							<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
  								<img alt="..." style="height: 276px; width: 416px;" src="../image/taller/<?php echo $dato['fotografia'] ?>" class="img-fluid" />
  								<a href="#!">
  									<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
  								</a>
  							</div>
  							<div class="card-body">
  								<h5 class="card-title"><?php echo $dato['taller'] ?></h5>
  								<p class="card-text">
  									<?php echo $dato['descripcion'] ?>
  								</p>
  								<a href="../panel/registro.php" class="btn btn-primary">Inscribirse</a>
  							</div>
  						</div>
  					</div>

  				<?php
					endforeach
					?>
  			</div>
  		</section>
  		<!--Section: Content-->



  		<!--MAPS -->

  		<h1>
  			Encuéntranos
  		</h1>
  		<hr class="my-5" />
  		<div class="container">
  			<div class="row">
  				<div class="col">
  					<h1>
  						Contáctanos
  					</h1>
  					<form>
  						<div class="form-group">
  							<label for="exampleFormControlInput1">Email address</label>
  							<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  						</div>
  						<div class="form-group">
  							<label for="exampleFormControlSelect1">Example select</label>
  							<select class="form-control" id="exampleFormControlSelect1">
  								<option>1</option>
  								<option>2</option>
  								<option>3</option>
  								<option>4</option>
  								<option>5</option>
  							</select>
  						</div>
  						<div class="form-group">
  							<label for="exampleFormControlSelect2">Example multiple select</label>
  							<select multiple class="form-control" id="exampleFormControlSelect2">
  								<option>1</option>
  								<option>2</option>
  								<option>3</option>
  								<option>4</option>
  								<option>5</option>
  							</select>
  						</div>
  						<div class="form-group">
  							<label for="exampleFormControlTextarea1">Example textarea</label>
  							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  						</div>
  					</form>

  				</div>
  				<div class="col">
  					<h1>
  						Ubicación
  					</h1>
  					<div class="col" style="align-content: center;">
  						<div class="map-responsive">
  							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3736.6187781518706!2d-100.81423458504176!3d20.521848286275212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cba88ad4cef97%3A0x6d5c18ec11bd59ae!2sBola%20del%20Agua!5e0!3m2!1ses-419!2smx!4v1625516961857!5m2!1ses-419!2smx" width="540" height="540" style="border:0; width: 100%;" allowfullscreen=""></iframe>
  						</div>
  					</div>
  				</div>

  			</div>
  		</div>
  	</div>




  </main>
  <!--Main layout-->



  </body>

  </html>