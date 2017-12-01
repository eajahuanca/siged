<ul class="nav nav-list">
	<li class="">
		<a href="{{ url('/home') }}">
			<i class="menu-icon fa fa-home"></i>
			<span class="menu-text"> Principal </span>
		</a>
		<b class="arrow"></b>
	</li>

	@if(strcmp(Auth::user()->us_tipo,'ADMINISTRADOR')==0)
	<li class="">
		<a href="{{ url('/user') }}">
			<i class="menu-icon fa fa-user"></i>
			<span class="menu-text">Usuarios</span>
		</a>
		<b class="arrow"></b>
	</li>
	@endif

	<li class="">
		<a href="{{ url('/curso') }}">
			<i class="menu-icon fa fa-bars"></i>
			<span class="menu-text">Cursos</span>
		</a>
		<b class="arrow"></b>
	</li>
</ul>