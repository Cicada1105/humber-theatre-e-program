@extends('layout.page_template')

@section('styles')
	<link rel="stylesheet" href="/css/acknowledgment.css" />
@endsection
@section('main-content')
	<h1>Humber Theatre Acknowledgement</h1>
	<section class="acknowledgment-section">
		<h2>Acknowledging The Land</h2>
		<p>Humber College is located within the traditional and treaty lands of the Mississaugas of the Credit. Known as Adoobiigok, the “Place of the Black Alders” in Michi Saagiig language, the region is uniquely situated along Humber River watershed, which historically provided an integral connection for Anishinaabe, Haudenosaunee, and Wendat peoples between the Ontario Lakeshore and the Lake Simcoe/Georgian Bay regions. Now home to people of numerous nations, Adoobiigok continues to provide a vital source of interconnection for all.</p>
	</section>
	<section class="about-humber-section">
		<h2>About Humber Theatre</h2>
		<p>Humber Theatre is the collaborative partnership between the Theatre Performance and Theatre Production programs. We are dedicated to training creative artists, from diverse backgrounds, with a strong foundation in essential discipline-specific skills. We believe in inter-cultural and multidisciplinary theatre that speaks in the present to a brave vision of the future.Each year, Humber Theatre presents a number of original productions which demand the full creative engagement of performance and production students under the guidance of internationally-recognized artists. By working together with artists who can guide and inspire, Humber Theatre’s graduates are prepared for multifaceted and successful careers in the arts community. The show you are seeing tonight is the product of this wonderful creative engagement.</p>
	</section>
	<section class="faculty-involved-section">
		<h2>Faculty {{ $faculty_involved['year'] }}</h2>
		<dl>
			@foreach ($faculty_involved['members'] as $member)
				<div class="faculty-involved-member flex-container">
					<dt>{{ $member['name'] }}</dt>
					<dd>{{ $member['role'] }}</dd>
				</div>
			@endforeach
		</dl>
	</section>
	<section class="faculty-section">
		<ul class='faculty-list'>
		@foreach ($faculty as $member)
			<li class="text-center">{{ $member }}</li>
		@endforeach
		</ul>
	</section>
	<section class="special-thanks-section">
		<h3>Special Thanks</h3>
		<p>Constanza Davila, Robert Metcalfe, Megan Naylor, Ryan Young, Natalie St-Pierre, Heather Hill, Robert “Bob” McCollum, Angela Carpenter, Shayna Burns, Henrique Santsper, Fides Krucker, Sharon B. Moore. A big thank you to the Students in the Humber College Broadcast Television/ Videography Program who filmed the in house broadcast you are about to watch.</p>
		<p>This digital program was created by students from the Web Development Post Graduate program:</p>
		<p>Jemi Soul, Mihoko Schick, Sandra Kupfer, Mahsa Karimi Fard, Josh Colvin.</p>
	</section>
	<section class="developers-section">

	</section>
@endsection