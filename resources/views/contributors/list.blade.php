@extends('layout.page_template', [ 'page' => 'List' ])

@section('styles')
	<link rel="stylesheet" href="/css/contributors/list.css" />
@endsection

@section('main-content')
	<h1>Contributors of {{ $active_program->title }}</h1>
	<form action='/pm/contributors/update' method="post">
		{{ csrf_field() }}
		<div class="flex-wrapper add-btn-cont">
			<button class="add-btn" formaction="/pm/contributors/contributor/add" formmethod="get">
				<fa class="fa-solid fa-plus" />
			</button>
		</div>
		<p id="active-program__text">Active Contributors</p>
		@foreach ($contributors as $contributor)
			@php($isContributor = $contributor->contributions->where("id", $active_program->id)->count() > 0)
			<section class="flex-wrapper contributor-row">
				<input class="contributor-row__toggle" type="checkbox" name="activeContributors" value={{ $contributor->id }} {{ $isContributor ? "checked" : "" }} />
				<h3 class="contributor-row__title">{{ $contributor->first_name }} {{ $contributor->last_name }}</h3>
				<div>
					<label for="">Role:</label>
					<input id="{{$contributor->first_name}}-{{$contributor->last_name}}-role" type="text" name="role" value={{ $isContributor ? $contributor->contributions->firstWhere('production_id', $active_program->id)->role : "" }} />
				</div>
				<select name="category">
					@php($categoryName = $isContributor ? $contributor->contributions->firstWhere('production_id', $active_program->id)->category : "");
					<option disabled selected>--Category--</option>
					<option value="performance" {{$isContributor && $categoryName=="performance" ? "selected" : ""}}>Performance</option>
					<option value="guest_artist" {{$isContributor && $categoryName=="guest_artist" ? "selected" : ""}}>Guest Artist</option>
					<option value="production" {{$isContributor && $categoryName=="production" ? "selected" : ""}}>Production</option>
				</select>
				<div class="contributor-row-controls">
					<button class="edit-btn" formaction="/pm/contributors/contributor/update/{{$contributor->id}}" formmethod="get">
						<fa class="fa-solid fa-pen-to-square" />
					</button>
					<button type="submit" class="delete-btn" formmethod="post" formaction="/pm/contributors/contributor/delete/{{$contributor->id}}">
						<fa class="fa-solid fa-trash-can" />
					</button>
				</div>
			</section>
		@endforeach
		<input class="btn" type="submit" />
	</form>
@endsection