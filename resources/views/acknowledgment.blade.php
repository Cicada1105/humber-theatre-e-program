@extends('layout.page_template', [ 'title' => (isset($title) ? $title : "Humber Program")])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/acknowledgment.css") }}">
@endsection
@section('main-content')
	@isset($title)
		<section class="acknowledgment-section">
			<h2>Acknowledging The Land</h2>
			@if(isset($current_program->land_acknowledgment))
				<p class="text-justify">{{ $current_program->land_acknowledgment }}</p>
			@else
				<p class="text-center">Humber College is located within the traditional and treaty lands of the Mississaugas of the Credit. Known as Adoobiigok, the “Place of the Black Alders” in Michi Saagiig language, the region is uniquely situated along Humber River watershed, which historically provided an integral connection for Anishinaabe, Haudenosaunee, and Wendat peoples between the Ontario Lakeshore and the Lake Simcoe/Georgian Bay regions. Now home to people of numerous nations, Adoobiigok continues to provide a vital source of interconnection for all.</p>
			@endif
		</section>
		<section class="about-humber-section">
			<h2>About Humber Theatre</h2>
			@if(isset($current_program->about_humber))
				<p class="text-justify">{{ $current_program->about_humber }}</p>
			@else
				<p class="text-center">Humber Theatre is the collaborative partnership between the Theatre Performance and Theatre Production programs. We are dedicated to training creative artists, from diverse backgrounds, with a strong foundation in essential discipline-specific skills. We believe in inter-cultural and multidisciplinary theatre that speaks in the present to a brave vision of the future. Each year, Humber Theatre presents a number of original productions which demand the full creative engagement of performance and production students under the guidance of internationally-recognized artists. By working together with artists who can guide and inspire, Humber Theatre’s graduates are prepared for multifaceted and successful careers in the arts community.</p>
			@endif
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
			@if(count($faculty_involvement))
				<ul class='faculty-list'>
				@foreach ($faculty_involvement as $involvement)
					@php($member = $involvement->faculty)
					<li class="text-center">{{ $member->first_name ?? ""}} {{ $member->last_name ?? "" }}</li>
				@endforeach
				</ul>
			@else
				<p class="text-center">No Current Faculty</p>
			@endif
		</section>
		@if ($current_program->special_thanks)
			<section class="special-thanks-section">
				<h3>Special Thanks</h3>
				<p>{{$current_program->special_thanks}}</p>
			</section>
		@endif
	    <section class="digital-accredidation-section">
	        <h2 class="text-upper">Digital Program Creation by:</h2>
	        <p class="text-center">Josh Colvin - joshicolvin@gmail.com</p>
	    </section>
	@else
        <h1 class="program-title text-upper">No Active Program</h1>
        <p class="text-center">There is no active program at this time. Please check back later</p>
	@endisset
@endsection