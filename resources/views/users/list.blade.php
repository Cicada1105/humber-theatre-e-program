@extends('layout.page_template', [ 'page' => 'List' ])

@section('styles')
	<link rel="stylesheet" href="/css/users/list.css" />
@endsection

@section('main-content')
	<h1>List Users</h1>
	@foreach($users as $user)
		<div class="flex-wrapper user-row">
			<h3>{{$user->name}}</h3>
			<p>{{$user->email}}</p>
			<div class="user-controls">
				<button class="edit-btn" formaction="/pm/users/{{$user->id}}" formmethod="get">
					<fa class="fa-solid fa-pen-to-square" />
				</button>
				<button type="submit" class="delete-btn" formmethod="post" formaction="/pm/users/{{$user->id}}" data-name="{{ $user->name }}">
					<fa class="fa-solid fa-trash-can" />
				</button>
			</div>
		</div>
	@endforeach
@endsection