@extends('layout.page_template')

@section('styles')
	<link rel="stylesheet" href="/css/acknowledgment.css" />
@endsection
@section('main-content')
	<h1>Humber Theatre Acknowledgement</h1>
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
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->seniorDean->first_name }} {{ $current_program->seniorDean->last_name }}</dt>
				<dd>Senior Dean, Faculty of Media and Creative Arts</dd>
			</div>
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->associateDean->first_name }} {{ $current_program->associateDean->last_name }}</dt>
				<dd>Associate Dean, Faculty of Media and Creative Arts</dd>
			</div>
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->headOfCarpentry->first_name }} {{ $current_program->headOfCarpentry->last_name }}</dt>
				<dd>Faculty Department Head of Carpentry</dd>
			</div>
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->theatreDirector->first_name }} {{ $current_program->theatreDirector->last_name }}</dt>
				<dd>Director Theatre Production</dd>
			</div>
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->headOfProperties->first_name }} {{ $current_program->headOfProperties->last_name }}</dt>
				<dd>Faculty Department Head of Properties</dd>
			</div>
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->voiceProfessor->first_name }} {{ $current_program->voiceProfessor->last_name }}</dt>
				<dd>Voice Professor, Vocal Research</dd>
			</div>
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->academicProgramManager->first_name }} {{ $current_program->academicProgramManager->last_name }}</dt>
				<dd>Academic Program Manager</dd>
			</div>
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->headOfLighting->first_name }} {{ $current_program->headOfLighting->last_name }}</dt>
				<dd>Faculty Department Head of Lighting</dd>
			</div>
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->headOfWardrobe->first_name }} {{ $current_program->headOfWardrobe->last_name }}</dt>
				<dd>Faculty Department Head of Wardrobe</dd>
			</div>
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->headOfMovement->first_name }} {{ $current_program->headOfMovement->last_name }}</dt>
				<dd>Head of Movement, Movement Director</dd>
			</div>
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->headOfSound->first_name }} {{ $current_program->headOfSound->last_name }}</dt>
				<dd>Faculty Department Head of Sound</dd>
			</div>
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->headOfPaint->first_name }} {{ $current_program->headOfPaint->last_name }}</dt>
				<dd>Faculty Department Head of Paint</dd>
			</div>
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->technicalDirector->first_name }} {{ $current_program->technicalDirector->last_name }}</dt>
				<dd>Technical Director</dd>
			</div>
			<div class="faculty-involved-member flex-container">
				<dt>{{ $current_program->Pso->first_name }} {{ $current_program->Pso->last_name }}</dt>
				<dd>PSO</dd>
			</div>
		</dl>
	</section>
	<section class="faculty-section">
		<ul class='faculty-list'>
		@foreach ($faculty as $member)
			<li class="text-center">{{ $member->first_name }} {{ $member->last_name }}</li>
		@endforeach
		</ul>
	</section>
	<section class="special-thanks-section">
		<h3>Special Thanks</h3>
		<p>{{$current_program->special_thanks}}</p>
	</section>
@endsection