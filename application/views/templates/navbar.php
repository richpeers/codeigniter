<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
	<div class="container">

		<a class="navbar-brand" href="/">Home</a>

		<button class="navbar-toggler"
				type="button"
				data-toggle="collapse"
				data-target="#navbarCollapse"
				aria-controls="navbarCollapse"
				aria-expanded="false"
				aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarCollapse">

			<div class="navbar-nav">
				<a class="nav-item nav-link" href="/news">News</a>
			</div>

			<div class="navbar-nav mr-auto">
				<a class="nav-item nav-link" href="https://github.com/richpeers/codeigniter" target="_blank"><i class="fab fa-github fa-2x"></i></a>
				<a class="nav-item nav-link" href="https://www.linkedin.com/in/richpeers" target="_blank"><i class="fab fa-linkedin fa-2x"></i></a>
			</div>
			<ul class="navbar-nav ml-auto">
				<?php if ($auth->guest()) { ?>
					<a class="btn btn-outline-light mr-3" href="/login">Login</a>
					<a class="btn btn-light" href="/register">Register</a>
				<?php } ?>

				<?php if ($auth->check()) { ?>
					<span class="navbar-text mr-3">
						<?php echo $auth->name() ?>
					</span>
					<a class="btn btn-outline-light" href="/logout">Logout</a>
				<?php } ?>

			</ul>

		</div>

	</div>
</nav>
