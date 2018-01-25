@extends('layouts.app')

@section('body')
		<!-- end header -->
		<section id="featured">
			<div class="background">
			<!-- start slider -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<!-- Slider -->
						<div id="main-slider" class="flexslider">
							<ul class="slides">
								<li>
									<img src="img/slides/1.jpg" alt="" />
								</li>
								<li>
									<img src="img/slides/2.jpg" alt="" />
								</li>
								<li>
									<img src="img/slides/3.jpg" alt="" />
								</li>
								<li>
									<img src="img/slides/4.jpg" alt="" />
								</li>
								<li>
									<img src="img/slides/5.jpg" alt="" />
								</li>
								<li>
									<img src="img/slides/6.jpg" alt="" />
								</li>																								
							</ul>
						</div>
						<!-- end slider -->
					</div>
				</div>
			</div>


			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-4">
								<div class="box shadow">
									<div class="box-gray aligncenter">
										<h4>TB</h4>
										<div class="icon">
											<i class="fa fa-desktop fa-3x"></i>
										</div>
										<p>Предпочитаете кино по телевизору?</p>
										<p>Вам сюда...</p>
									</div>
									<div class="box-bottom">
										<a href="tv-films-all">Сегодня на ТВ...</a>
									</div>
								</div>
							</div>
							<div class="vs col-lg-4"><img src="img/5297593-8426729621-versu.png"></div>
							<div class="col-lg-4 padding-right">
								<div class="box shadow">
									<div class="box-gray aligncenter">
										<h4>КИНОТЕАТР</h4>
										<div class="icon">
											<i class="fa fa-desktop fa-3x"></i>
										</div>
										<p>Интересуют фильмы в кинопрoкате?</p>
										<p>Вам сюда...</p>
									</div>
									<div class="box-bottom">
										<a href="cinema">Сейчас в кинотеатрах...</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- divider -->
				<div class="row">
					<div class="col-lg-12">
						<div class="solidline">
						</div>
					</div>
				</div>
				<!-- end divider -->
				<!-- Portfolio Projects -->
			</div>	
			</div>
		</section>

@endsection		