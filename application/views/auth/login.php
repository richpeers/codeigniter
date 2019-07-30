<main class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 mt-4">

			<?php if (!empty($this->input->get('msg')) && $this->input->get('msg') == 1) { ?>
				<div class="alert alert-danger">
					Could not log you in with these credentials.
				</div>
			<?php } ?>

			<?php echo form_open('auth/login'); ?>

			<div class="card bg-light">

				<div class="card-header">
					Login
				</div>

				<div class="card-body">

					<div class="form-group">
						<label class="control-label" for="title">Email</label>
						<input type="email" class="form-control" name="email" required/>
					</div>

					<div class="form-group">
						<label class="control-label" for="text">Password</label>
						<input type="password" class="form-control" name="password" required/>
					</div>

					<?php if (validation_errors()) { ?>
						<div class="alert alert-danger">
							<?php echo validation_errors(); ?>
						</div>
					<?php } ?>

					<button type="submit" name="submit" class="btn btn-outline-primary">Login</button>

				</div>
			</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</main>
