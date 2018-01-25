@extends('tv')

@section('content')

	<div class="post-heading">
		<h3>Сегодня в эфире</h3>
	</div>
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
					@foreach($show_films_before as $f)
						<tr>															
							<td class="td-name">{{ $f['name'] }}</td>			
							<td class="td">{{ $f['start'] }}</td>
							<td class="td">{{ $f['finish'] }}</td>
							<td class="td">{{ $f->channal->name }}</td> <!-- так как в виде фильм.пхп установленна связь с табл Канал, берем имя канала для фильма через айди_канал фильма -->
						</tr>
					@endforeach
					@foreach($show_films_after as $f)
						<tr>															
							<td class="td-name">{{ $f['name'] }}</td>			
							<td class="td">{{ $f['start'] }}</td>
							<td class="td">{{ $f['finish'] }}</td>
							<td class="td">{{ $f->channal->name }}</td> <!-- так как в виде фильм.пхп установленна связь с табл Канал, берем имя канала для фильма через айди_канал фильма -->
						</tr>
					@endforeach	
				</tbody>	
			</table>


@endsection