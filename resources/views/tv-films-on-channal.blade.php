@extends('tv')

@section('content')

	<div class="post-heading">
		<h3>{{ $channal_id->name }}</h3>
	</div>
		@if(isset($films_id_before[0]) or isset($films_id_after[0]))
			<table class="table">
				<thead>
					<tr>
						<th>Фильм</th>
						<th>Начало</th>
						<th>Конец</th>
						<th>Канал</th>
					</tr>
				</thead>
				<tbody>
					@foreach($films_id_before as $f)
						<tr>															
							<td class="td-name">{{ $f['name'] }}</td>			
							<td class="td">{{ $f['start'] }}</td>
							<td class="td">{{ $f['finish'] }}</td>
							<td class="td">{{ $f->channal->name }}</td> <!-- так как в виде фильм.пхп установленна связь с табл Канал, берем имя канала для фильма через айди_канал фильма -->
						</tr>
					@endforeach
				@if(isset($films_id_after[0]))	
					@foreach($films_id_after as $f)
						<tr>															
							<td class="td-name">{{ $f['name'] }}</td>			
							<td class="td">{{ $f['start'] }}</td>
							<td class="td">{{ $f['finish'] }}</td>
							<td class="td">{{ $f->channal->name }}</td> <!-- так как в виде фильм.пхп установленна связь с табл Канал, берем имя канала для фильма через айди_канал фильма -->
						</tr>
					@endforeach
				@endif	
				</tbody>	
			</table>
		@else
		<h4 class="no-films">К сожалению сегодня на этом телеканале фильмов нет :-(</h4>
		@endif

@endsection