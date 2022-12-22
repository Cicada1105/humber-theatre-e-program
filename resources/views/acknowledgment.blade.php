@extends('layout.page_template')

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/acknowledgment.css") }}">
@endsection
@section('main-content')
	<section class="acknowledgment-section">
		<h2>Acknowledging The Land</h2>
		<p style="text-align:center">{{$current_program->land_acknowledgment}}</p>
	</section>
	<section class="about-humber-section">
		<h2>About Humber Theatre</h2>
		<p style="text-align:center">{{$current_program->about_humber}}</p>
	</section>
	<section class="faculty-involved-section">
		<h2>Faculty {{ date('Y') }}</h2>
		<dl>
			@foreach($faculty_involvement as $involvement)
				@if (!is_null($involvement['faculty_role_id']))
					@php($faculty = $involvement->faculty)
					@php($facultyRole = $involvement->facultyRole->role)
					@php($roleId = str_replace(" ", "-", strtolower($facultyRole)))
					<div class="faculty-involved-member flex-container">
						<dt aria-describedBy="{{$roleId}}">
							{{ $faculty->first_name }} {{ $faculty->last_name }}
						</dt>
						<dd id="{{$roleId}}">{{ $facultyRole }}</dd>
					</div>
				@endif
			@endforeach
		</dl>
	</section>
	<section class="faculty-section">
		<ul class='faculty-list'>
		@foreach ($faculty_involvement as $involvement)
			@php($member = $involvement->faculty)
			<li class="text-center">{{ $member->first_name ?? ""}} {{ $member->last_name ?? "" }}</li>
		@endforeach
		</ul>
	</section>
	@if ($current_program->special_thanks)
		<section class="special-thanks-section">
			<h3>Special Thanks</h3>
			<p>{{$current_program->special_thanks}}</p>
		</section>
	@endif	
@endsection