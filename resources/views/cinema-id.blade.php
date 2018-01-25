@extends('layouts.app')

@section('body')
		
	@foreach($show_cinema_id as $q)

	<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="film-id">{{ $q->name }}</h2>
						<div class="col-lg-4">

							<img src="{{ $q->cinema_thumb }}">
						</div>
						<div class="col-lg-4 description">
							<h4>{{ $q->country_year }}{{ $q->genre }}</h4>
							<p><span>Режиссёр: </span>{{ $q->director or 'информации нет' }}</p> <!-- {{ $q->director or 'информации нет' }} короткий вид записи if, если переменной нет - отобразится текст 'информации нет' -->
							<p><span>Актёры: </span>{{ $q->actors or 'информации нет' }}</p>
							<p><span>Продолжительность: </span>{{ $q->time or 'информации нет' }}</p>
							<p><span>Премьера в Украине: </span>{{ $q->in_ua or 'информации нет' }}</p>
							<p><span>Мировая премьера: </span>{{ $q->in_world or 'информации нет' }}</p>
							<p><span>Бюджет: </span>{{ $q->budget or 'информации нет' }}</p>
							<p><span>Мировые кассовые сборы: </span>{{ $q->sum or 'информации нет' }}</p>
							<br>
				
							<?php 
							echo $q->look
							?>
						</div>
						<div class="col-lg-4 description">
							<h4>Описание:</h4>
							<?php 
							echo $q->description;
							 ?>
						</div>
					</div>


							<ul id="thumbs" class="portfolio">
								<div class="col-lg-12 design">
									@if (isset($q->frame_thumb_1) != NULL)										
									<h3>Кадры из фильма:</h3>
									<div class="col-lg-2"><a class="hover-wrap fancybox" data-fancybox-group="0" title="{{ $q->name }}" href="{{ $q->frame_thumb_1 }}"><img src="{{ $q->frame_thumb_1 }}"></a></div>
									@endif
									@if (isset($q->frame_thumb_2) != NULL)									
									<div class="col-lg-2"><a class="hover-wrap fancybox" data-fancybox-group="0" title="{{ $q->name }}" href="{{ $q->frame_thumb_2 }}"><img src="{{ $q->frame_thumb_2 }}"></a></div>
									@endif
									@if (isset($q->frame_thumb_3) != NULL)
									<div class="col-lg-2"><a class="hover-wrap fancybox" data-fancybox-group="0" title="{{ $q->name }}" href="{{ $q->frame_thumb_3 }}"><img src="{{ $q->frame_thumb_3 }}"></a></div>
									@endif
									@if (isset($q->frame_thumb_4) != NULL)
									<div class="col-lg-2"><a class="hover-wrap fancybox" data-fancybox-group="0" title="{{ $q->name }}" href="{{ $q->frame_thumb_4 }}"><img src="{{ $q->frame_thumb_4 }}"></a></div>
									@endif
									@if (isset($q->frame_thumb_5) != NULL)
									<div class="col-lg-2"><a class="hover-wrap fancybox" data-fancybox-group="0" title="{{ $q->name }}" href="{{ $q->frame_thumb_5 }}"><img src="{{ $q->frame_thumb_5 }}"></a></div>
									@endif
									@if (isset($q->frame_thumb_6) != NULL)	
									<div class="col-lg-2"><a class="hover-wrap fancybox" data-fancybox-group="0" title="{{ $q->name }}" href="{{ $q->frame_thumb_6 }}"><img src="{{ $q->frame_thumb_6 }}"></a></div>
									@endif
								</div>
									@if (isset($q->frame_thumb_1) != NULL)	
									<li class="item-thumbs col-lg-3 design" data-id="0" data-type="icon">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-id="0" data-fancybox-group="0" title="{{ $q->name }}" href="{{ $q->frame_thumb_1 }}">							
										</a>
									</li>
									@endif										
									@if (isset($q->frame_thumb_2) != NULL)										
									<li class="item-thumbs col-lg-3 design" data-id="0" data-type="icon">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-id="0" data-fancybox-group="0" title="{{ $q->name }}" href="{{ $q->frame_thumb_2 }}">							
										</a>
									</li>
									@endif										
									@if (isset($q->frame_thumb_3) != NULL)										
									<li class="item-thumbs col-lg-3 design" data-id="0" data-type="icon">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-id="0" data-fancybox-group="0" title="{{ $q->name }}" href="{{ $q->frame_thumb_3 }}">							
										</a>
									</li>
									@endif										
									@if (isset($q->frame_thumb_4) != NULL)										
									<li class="item-thumbs col-lg-3 design" data-id="0" data-type="icon"">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-id="0" data-fancybox-group="0" title="{{ $q->name }}" href="{{ $q->frame_thumb_4 }}">							
										</a>
									</li>
									@endif									
									@if (isset($q->frame_thumb_5) != NULL)	
									<li class="item-thumbs col-lg-3 design" data-id="0" data-type="icon">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-id="0" data-fancybox-group="0" title="{{ $q->name }}" href="{{ $q->frame_thumb_5 }}">							
										</a>
									</li>
									@endif									
									@if (isset($q->frame_thumb_6) != NULL)	
									<li class="item-thumbs col-lg-3 design" data-id="0" data-type="icon">
										<!-- Fancybox - Gallery Enabled - Title - Full Image -->
										<a class="hover-wrap fancybox" data-id="0" data-fancybox-group="0" title="{{ $q->name }}" href="{{ $q->frame_thumb_6 }}">							
										</a>
									</li>
									@endif
							</ul>
				</div>
			</div>
	</section>

	@endforeach

@endsection	