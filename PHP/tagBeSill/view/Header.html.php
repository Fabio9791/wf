<header class="container mb-5">
	<div class="row">
		<div class="col-sm-3">
			<img alt="Logo" src="/img/logo.png" class="img-fluid">
		</div>
		<div class="col align-self-end">
			<h1>
				<strong class="fs-important"> <span class="c-red">Tag</span><span
					class="c-green">Be</span><span class="c-blue">Sill</span>
				</strong> <span class="fs-05">Project management system</span>
			</h1>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarTogglerDemo01"
			aria-controls="navbarTogglerDemo01" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item" <?php if($_SERVER['REQUEST_URI'] == '/'){?>active<?php }?>><a class="nav-link" href="/">Home</a></li>
				<li class="nav-item" <?php if($_SERVER['REQUEST_URI'] == '/register'){?>active<?php }?>><a class="nav-link" href="/register">Register</a></li>
				<li class="nav-item" <?php if($_SERVER['REQUEST_URI'] == '/login'){?>active<?php }?>><a class="nav-link" href="/login">Login</a></li>
			</ul>
			
		</div>
	</nav>

</header>
