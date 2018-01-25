@extends('layouts.app')

@section('body')
		<!-- end header -->
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
							<li class="active">Обратная связь</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h3 class="form-color text-center">Последние отзывы</h3>
		@foreach($show_review as $sr)
		@if ($sr['id'] > 0)
						<div class="panel panel-primary">
						<div class="panel-heading "><div class="rev-name"><small>{{ $sr['created_at'] }}</small></div><div><strong>{{ $sr['name'] }}</strong></div></div>
						<div class="panel-body">{{ $sr['text'] }}</div>
						</div>
		@endif					
		@endforeach
					</div>
				</div>				
			</div>
		</section>

@endsection
