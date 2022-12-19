<header class="flex-container p1">
	@if (Auth::check())
	    <a href="/pm">
	    	<img id="page-header-logo" src="{{ url("/imgs/Faculty_of_Media_and_Creative_Arts_All-white.png") }}" alt="Humber College Faculty of Media and Creative Arts Logo" />
	    </a>
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
	    <a href="/">
	    	<img id="page-header-logo" src="{{ url("/imgs/Faculty_of_Media_and_Creative_Arts_All-white.png") }}" alt="Humber College Faculty of Media and Creative Arts Logo" />
	    </a>
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