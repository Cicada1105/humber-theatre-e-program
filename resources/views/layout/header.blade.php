<header class="page-header flex-container p1">
	<a id="skip-content__link" class="btn hidden" href="#maincontent">Skip to main content</a>
	@if (Auth::check())
	    <h2>
	    	<img id="page-header__logo" src="{{ url("/imgs/Faculty_of_Media_and_Creative_Arts_All-white.png") }}" alt="Humber College Faculty of Media and Creative Arts Logo">
	    </h2>
		<nav>
			<ul class="flex-container nav-list">
				<li class="nav-list__item">
					<a href="/pm/contributors">Contributors</a>
				</li>
				<li class="nav-list__item">
					<a href="/pm/humber">Humber Theatre</a>
				</li>
				<li class="nav-list__item">
					<a href="/pm/faculty">Faculty</a>
				</li>
				<li class="nav-list__item">
					<a href="/pm/preview">Preview</a>
				</li>
				@if (Auth::user()->name === "admin")
					<li class="nav-list__item">
						<a href="/pm/users">Users</a>
					</li>
				@endif
				<li class="nav-list__item">
					<a href="/logout">Logout</a>
				</li>
			</ul>
		</nav>
	@else
		<h2>
	   		<img id="page-header__logo" src="{{ url("/imgs/Faculty_of_Media_and_Creative_Arts_All-white.png") }}" alt="Humber College Faculty of Media and Creative Arts Logo">
	   	</h2>
		<nav>
			<ul class="flex-container nav-list">
				<li class="nav-list__item">
					<a href="/">About</a>
				</li>
				<li class="nav-list__item">
					<a href="/contributors">Contributors</a>
				</li>
				<li class="nav-list__item">
					<a href="/humber-theatre">Humber Theatre</a>
				</li>
				<li class="nav-list__item">
					<a href="/login">Login</a>
				</li>
			</ul>
		</nav>
	@endif
</header>