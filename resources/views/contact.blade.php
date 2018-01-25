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
						{!! Form::open(['action'=>'FilmController@addReview']) !!} 
					<div class="form-group">
						<h3 class="form-color text-center">Свяжитесь с нами, заполнив контактную форму ниже</h3>
						{!! Form::text('name', '', ['class'=>'form-control', 'maxlength="20"', 'required', 'placeholder'=>'Введите Ваше имя']) !!}
						<br>
						{!! Form::textarea('text', '', ['class'=>'form-control', 'maxlength="500"', 'required', 'placeholder'=>'Введите текст Вашего сообщение']) !!}
					</div>
					<div class="text-center">
					{!! Form::submit('Добавить отзыв', ['class'=>'btn btn-theme']) !!}
					</div>
					{!! Form::close() !!}
					<h5 class="form-h5">*оставьте Ваше предложение по улучшению сайта</h5>					
					</div>
				</div>
			</div>
		</section>

		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">

		@foreach($show_review as $sr)
		@if ($sr['id'] > 0)
						<div class="panel panel-primary">
						<div class="panel-heading "><div class="rev-name"><small>{{ $sr['created_at'] }}</small></div><div><strong>{{ $sr['name'] }}</strong></div></div>
						<div class="panel-body">{{ $sr['text'] }}</div>
						</div>
		@endif					
		@endforeach
						<form action="/contact-all/">
						    <div class="text-center"><button type="submit" class="btn btn-theme ">Посмотреть больше отзывов</button></div>
						</form>
					</div>
				</div>				
			</div>
		</section>

@endsection
