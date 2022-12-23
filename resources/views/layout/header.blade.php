<header class="page-header flex-container p1">
	<a id="skip-content__link" class="btn hidden" href="#maincontent">Skip to main content</a>
	@if (Auth::check())
	    <h2>
	    	<img id="page-header__logo" src="{{ url("/imgs/Faculty_of_Media_and_Creative_Arts_All-white.png") }}" alt="Humber College Faculty of Media and Creative Arts Logo">
	    </h2>
		<nav>
			<ul class="flex-container nav-list">
				<li class="nav-list__item">
					<a class="nav-list__link" href="#">Productions</a>
					<ul class="nav-sub-list">
						<li class="nav-sub-list__item">
							<a href="{{ url('/pm') }}">All</a>
						</li>
						<li class="nav-sub-list__item">
							<a href="{{ url('/pm/preview') }}">Preview</a>
						</li>
					</ul>
				</li>
				<li class="nav-list__item">
					<a class="nav-list__link" href="{{ url('/pm/contributors') }}">Contributors</a>
				</li>
				<li class="nav-list__item">
					<a class="nav-list__link" href="#">Humber Theatre</a>
					<ul class="nav-sub-list">
						<li class="nav-sub-list__item">
							<a href="{{ url('/pm/humber') }}">Acknowledgment</a>
						</li>
						<li class="nav-sub-list__item">
							<a href="{{ url('/pm/faculty') }}">Faculty</a>
						</li>
						<li class="nav-sub-list__item">
							<a href="{{ url('/pm/faculty-roles') }}">Faculty Roles</a>
						</li>
					</ul>
				</li>
				@if (Auth::user()->name === "admin")
					<li class="nav-list__item">
						<a class="nav-list__link" href="{{ url('/pm/users') }}">Users</a>
					</li>
				@endif
				<li class="nav-list__item">
					<a class="nav-list__link" href="{{ url('/logout') }}">Logout</a>
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
					<a class="nav-list__link" href="{{ url('/') }}">About</a>
				</li>
				<li class="nav-list__item">
					<a class="nav-list__link" href="{{ url('/contributors') }}">Contributors</a>
				</li>
				<li class="nav-list__item">
					<a class="nav-list__link" href="{{ url('/humber-theatre') }}">Humber Theatre</a>
				</li>
				<li class="nav-list__item">
					<a class="nav-list__link" href="{{ url('/login') }}">Login</a>
				</li>
			</ul>
		</nav>
	@endif
</header>