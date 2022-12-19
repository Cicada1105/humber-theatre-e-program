@extends('layout.page_template', [ 'page' => 'List' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/productions/list.css") }}" />
@endsection

@section('main-content')
	<h1>Humber Productions</h1>
	<form action='/pm/update' method="post">
		{{ csrf_field() }}
		<div class="flex-wrapper add-btn-cont">
			<button class="add-btn" formaction="/pm/production/add" formmethod="get">
				<fa class="fa-solid fa-plus" />
			</button>
		</div>
		<p id="active-program__text">Active Program</p>
		@foreach ($productions as $production)
			<div class="production-row">
				<input class="production-row__toggle" type="radio" name="activeProgram" value={{$production->id}} {{ $production->is_active ? "checked" : "" }} />
				<h3 class="production-row__title">{{ $production->title }}</h3>
				<span class="published">{{ $production->is_published ? "(Published)" : ""}}</span>
				<div class="production-row-controls">
					<button class="edit-btn" formaction="/pm/production/update/{{$production->id}}" formmethod="get">
						<fa class="fa-solid fa-pen-to-square" />
					</button>
					<button type="submit" class="delete-btn" formmethod="post" formaction="/pm/production/delete/{{$production->id}}">
						<fa class="fa-solid fa-trash-can" />
					</button>
				</div>
			</div>
		@endforeach
		<input class="btn" type="submit" />
	</form>
@endsection