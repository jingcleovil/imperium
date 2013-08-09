<div class="menu">
	<ul>
		<li><a href="{{ url() }}" class="<?=isset($module) && $module == "main" ? 'active' : '' ?>"><i class="icon1-home"></i> Home</a></li>
		<li><a href="{{ url('accounts/create') }}" class="<?=isset($module) && $module == "create" ? 'active' : '' ?>"><i class="icon1-user"></i> Register</a></li>
		<li><a href=""><i class="icon1-cart"></i> Purchase</a></li>
		<li><a href=""><i class="icon1-usd"></i> Donate</a></li>
		<li><a href=""><i class="icon1-server"></i> Server Info</a></li>
	</ul>
</div>