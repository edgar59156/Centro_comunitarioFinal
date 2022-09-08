<div class="fondo">

	<div>

		<div>
			<div id="carouselExampleFade" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img style="width: 960px; height: 480px;" src="/centro_comunitario/assets/img/nature/image1.jpg" class="d-block w-100" alt="/centro_comunitario/assets/img/nature/image1.jpg">
					</div>
					<div class="carousel-item">
						<img style="width: 960px; height: 480px;" src="/centro_comunitario/assets/img/nature/image2.jpg" class="d-block w-100" alt="/centro_comunitario/assets/img/nature/image1.jpg">
					</div>
					<div class="carousel-item">
						<img style="width: 960px; height: 480px;" src="/centro_comunitario/assets/img/nature/image3.jpg" class="d-block w-100" alt="/centro_comunitario/assets/img/nature/image1.jpg">
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</button>
			</div>

			<div>
				<section class="portfolio-block photography">
					<div class="container-fluid">
						<h1>
							¡Nuestras instalaciones!
						</h1>
					</div>
					<div class="container">
						<div class="row g-0">
							<div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img style="height:250px; width: 432px;" class="img-fluid image" src="/centro_comunitario/image/proyecto/inst1.jpg" /></a></div>
							<div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img style="height:250px; width: 432px;" class="img-fluid image" src="/centro_comunitario/image/proyecto/inst2.jpg" /></a></div>
							<div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img style="height:250px; width: 432px;" class="img-fluid image" src="/centro_comunitario/image/proyecto/inst3.jpg" /></a></div>
						</div>
					</div>
				</section>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h1>
							Proximos Eventos
						</h1>
						<div class="row">
							<?php
							foreach ($datosevento as $key => $dato) :
							?>
								<div class="col-lg-4" style="justify-content: center;">
									<img class="img-fluid image" style="justify-content: center;" src="../image/evento/<?php echo $dato['fotografia'] ?>" alt="Generic placeholder image" width="140" height="140">
									<h2><?php echo $dato['evento'] ?></h2>
									<p><?php echo $dato['descripcion'] ?></p>
									<p><a class="btn btn-secondary" href="https://getbootstrap.com/docs/4.1/examples/carousel/#" role="button">View details »</a></p>
								</div>
							<?php
							endforeach
							?>
						</div>



						<h1>
							Talleres y Cursos
						</h1>
						<div class="row">
							<?php
							foreach ($datos as $key => $dato) :
							?>
								<div class="col-md-4" style="padding: 1%;">
									<div class="card h-100" style="background-color: #0001">
										<img class="card-img-top" alt="Bootstrap Thumbnail First" src="../image/taller/<?php echo $dato['fotografia'] ?>" width="250" height="150">
										<div class="card-block">
											<h5 class="card-title">
												<?php echo $dato['taller'] ?>
											</h5>
											<p class="card-text">
												<?php echo $dato['descripcion'] ?>
											</p>
											<p>
												<a class="btn btn-primary" href="#">Inscribirse ahora!</a> <a class="btn" href="#">Saber más</a>
											</p>
										</div>
									</div>
								</div>
							<?php
							endforeach
							?>
						</div>
					</div>

					<h1>
						Encuentranos
					</h1>
					<div class="container">
						<div class="row">
							<div class="col">
								<h1>
									Contactanos
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
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3736.6187781518706!2d-100.81423458504176!3d20.521848286275212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cba88ad4cef97%3A0x6d5c18ec11bd59ae!2sBola%20del%20Agua!5e0!3m2!1ses-419!2smx!4v1625516961857!5m2!1ses-419!2smx" width="540" height="540" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
									</div>
								</div>
							</div>

						</div>
					</div>

					<!-- <section>
						<div class="container">
							<div>
								<h2>Special Skills</h2>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="card special-skill-item border-0">
										<div class="card-header bg-transparent border-0"><i class="icon ion-ios-star-outline"></i></div>
										<div class="card-body">
											<h3 class="card-title">Web Design</h3>
											<p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card special-skill-item border-0">
										<div class="card-header bg-transparent border-0"><i class="icon ion-ios-lightbulb-outline"></i></div>
										<div class="card-body">
											<h3 class="card-title">Interface Design</h3>
											<p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card special-skill-item border-0">
										<div class="card-header bg-transparent border-0"><i class="icon ion-ios-gear-outline"></i></div>
										<div class="card-body">
											<h3 class="card-title">Photography and Print</h3>
											<p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						
					</section> -->

				</div>


			</div>

			</body>

			</html>