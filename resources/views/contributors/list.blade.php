@extends('layout.page_template', [ 'page' => 'List' ])

@section('styles')
	<link rel="stylesheet" href="/css/pm/list.css" />
@endsection

@section('main-content')
	<h1>Contributors of [Current Program]</h1>
	<form action='/pm/contributors/update' method="post">
		{{ csrf_field() }}
		<div class="flex-wrapper add-btn-cont">
			<button class="add-btn" formaction="/pm/contributors/contributor/add" formmethod="get">
				<fa class="fa-solid fa-plus" />
			</button>
		</div>
		<p id="active-program__text">Active Contributors</p>
		@foreach ($contributors as $contributor)
			<div class="contributor-row">
				<input class="contributor-row__toggle" type="checkbox" name="activeContributors" {{ $contributor->contributions->where('id',$active_program_id)->count() > 0 ? "checked" : "" }} />
				<h3 class="contributor-row__title">{{ $contributor->first_name }} {{ $contributor->last_name }}</h3>
				<div class="contributor-row-controls">
					<button class="edit-btn" formaction="/pm/contributors/contributor/update/{{$contributor->id}}" formmethod="get">
						<fa class="fa-solid fa-pen-to-square" />
					</button>
					<button type="submit" class="delete-btn" formmethod="post" formaction="/pm/contributors/contributor/delete/{{$contributor->id}}">
						<fa class="fa-solid fa-trash-can" />
					</button>
				</div>
			</div>
		@endforeach
		<input class="btn" type="submit" />
	</form>
@endsection