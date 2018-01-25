@extends('layouts.app')

@section('body')

		<!-- end header -->
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="/"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
							<li class="active">Кинопрокат</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="heading">Сегодня в кинопрокате:</h2>
						<div class="row">
							<section id="projects">
								<ul id="thumbs" class="portfolio">
<?php $count = 0; ?>								<!-- Item Project and Filter Name -->
@foreach($show_cinema as $q)
<?php $count++; ?>
									<div class="col-lg-12 design">
									<h3>{{ $q->name }}</h3>
									<li class="col-lg-6 design" data-id="0" data-type="web">
										<div class="item-thumbs">
											<!-- Fancybox - Gallery Enabled - Title - Full Image -->
											<a class="hover-wrap fancybox" data-fancybox-group="{{ $count }}" title="{{ $q->name }}" href="{{ $q->cinema_thumb }}">
												<div class="overlay-img""><h5>КАДРЫ</h5>
													@if (isset($q->frame_thumb_1) != NULL)
													<img src="{{ $q->frame_thumb_1 }}">
													@endif
													@if (isset($q->frame_thumb_2) != NULL)						
													<img src="{{ $q->frame_thumb_2 }}">
													@endif
													@if (isset($q->frame_thumb_3) != NULL)	
													<img src="{{ $q->frame_thumb_3 }}">
													@endif
													@if (isset($q->frame_thumb_4) != NULL)	
													<img src="{{ $q->frame_thumb_4 }}">
													@endif
													@if (isset($q->frame_thumb_5) != NULL)	
													<img src="{{ $q->frame_thumb_5 }}">
													@endif
													@if (isset($q->frame_thumb_6) != NULL)	
													<img src="{{ $q->frame_thumb_6 }}">
													@endif
												</div>

											</a>

											<!-- Thumb Image and Description -->
											<img class="general-thumb" src="{{ $q->cinema_thumb }}" alt="{{ $q->name }}">
	
										</div>
									
									</li>
									<div class="col-lg-6 description">
										<h4>{{ $q->country_year }}{{ $q->genre }}</h4>
										<p><span>Режиссёр: </span>{{ $q->director or 'информации нет' }}</p>
										<p><span>Актёры: </span>{{ $q->actors or 'информации нет' }}</p>
										<p><span>Премьера в Украине: </span>{{ $q->in_ua or 'информации нет' }}</p>
										<a href="{{url('/cinema/'.$q->id)}}">Подробнее...</a>					  
									</div>
									</div>
									@if (isset($q->frame_thumb_1) != NULL)
									<li class="item-thumbs col-lg-3 design" data-id="{{ $count }}" data-type="icon">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-id="{{ $count }}" data-fancybox-group="{{ $count }}" title="{{ $q->name }}" href="{{ $q->frame_thumb_1 }}">		
										</a>
									</li>
									@endif									
									@if (isset($q->frame_thumb_2) != NULL)
									<li class="item-thumbs col-lg-3 design" data-id="{{ $count }}" data-type="icon">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-id="{{ $count }}" data-fancybox-group="{{ $count }}" title="{{ $q->name }}" href="{{ $q->frame_thumb_2 }}">		
										</a>
									@endif									
									@if (isset($q->frame_thumb_3) != NULL)	
									</li>
									<li class="item-thumbs col-lg-3 design" data-id="{{ $count }}" data-type="icon">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-id="{{ $count }}" data-fancybox-group="{{ $count }}" title="{{ $q->name }}" href="{{ $q->frame_thumb_3 }}">		
										</a>
									</li>
									@endif									
									@if (isset($q->frame_thumb_4) != NULL)	
									<li class="item-thumbs col-lg-3 design" data-id="{{ $count }}" data-type="icon">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-id="{{ $count }}" data-fancybox-group="{{ $count }}" title="{{ $q->name }}" href="{{ $q->frame_thumb_4 }}">		
										</a>
									</li>
									@endif									
									@if (isset($q->frame_thumb_5) != NULL)	
									<li class="item-thumbs col-lg-3 design" data-id="{{ $count }}" data-type="icon">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-id="{{ $count }}" data-fancybox-group="{{ $count }}" title="{{ $q->name }}" href="{{ $q->frame_thumb_5 }}">		
										</a>
									</li>
									@endif									
									@if (isset($q->frame_thumb_6) != NULL)	
									<li class="item-thumbs col-lg-3 design" data-id="{{ $count }}" data-type="icon">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-id="{{ $count }}" data-fancybox-group="{{ $count }}" title="{{ $q->name }}" href="{{ $q->frame_thumb_6 }}">		
										</a>
									</li>
									@endif

@endforeach										

								</ul>
							</section>
						</div>
					</div>
				</div>							
			</div>
		</section>

@endsection		