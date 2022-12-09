@extends('layout.page_template', [ 'page' => 'List' ])

@section('styles')
	<link rel="stylesheet" href="/css/faculty/list.css" />
@endsection

@section('main-content')
	<h1>Humber Theatre Faculty</h1>
	<a id="active-faculty__link" href="/pm/faculty/update">View Active Faculty</a>
	<form action='/pm/faculty/update' method="post">
		{{ csrf_field() }}
		<div class="flex-wrapper add-btn-cont">
			<button class="add-btn" formaction="/pm/faculty/add" formmethod="get">
				<fa class="fa-solid fa-plus" />
			</button>
		</div>
		@foreach ($faculty as $member)
			<div class="flex-wrapper member-row">
				<h3 class="member-row__title">{{ $member->first_name }} {{ $member->last_name }}</h3>
				<div class="member-row-controls">
					<button class="edit-btn" formaction="/pm/faculty/update/{{$member->id}}" formmethod="get">
						<fa class="fa-solid fa-pen-to-square" />
					</button>
					<button type="submit" class="delete-btn" formmethod="post" formaction="/pm/faculty/delete/{{$member->id}}">
						<fa class="fa-solid fa-trash-can" />
					</button>
				</div>
			</div>
		@endforeach
		<input class="btn" type="submit" />
	</form>
@endsection