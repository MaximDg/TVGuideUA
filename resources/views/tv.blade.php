@extends('layouts.app')

@section('body')
		<!-- end header -->
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="/"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
							<li class="active">ТВ</li>
						</ul>
					</div>
					<div class="col-lg-10 navbar-collapse collapse ">
						<ul class="breadcrumb lilili">
							@foreach($show_channals as $c)																
									<li><a href="{{url('/'.$c->id)}}"><img src="{{ $c->canal_thumb }}"></a></li>
							@endforeach	
						</ul>							
					</div>				
				</div>
			</div>
		</section>
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<article>



@yield('content')

				

						</article>
					</div>
					<div class="col-lg-4">
						<aside class="right-sidebar">
							<div class="widget">
								<h4 class="widgetheading">Официальные сайты каналов:</h4>
								<table class="table table-canal">
									<tbody>
										@foreach($show_channals as $c)
											<tr>															
												<td class="td"><a href="{{ $c->url }}" target="_blank">{{ $c->name }}</a></td>			
												<td class="td"><img src="{{ $c->canal_thumb }}"></td>
											</tr>
										@endforeach	
									</tbody>	
								</table>
							</div>							
						</aside>
					</div>
				</div>
			</div>
		</section>
@endsection