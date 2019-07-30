<main class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 mt-4">

			<?php echo form_open('auth/actionCreate'); ?>

			<div class="card bg-light">

				<div class="card-header">
					Register
				</div>

				<div class="card-body">

					<div class="form-group">
						<label class="control-label" for="title">Name</label>
						<input type="tect" class="form-control" name="name"/>
					</div>

					<div class="form-group">
						<label class="control-label" for="title">Email</label>
						<input type="email" class="form-control" name="email" required/>
					</div>

					<div class="form-group">
						<label class="control-label" for="text">Password</label>
						<input type="password" class="form-control" name="password" required/>
					</div>

					<div class="form-group">
						<label class="control-label" for="text">Confirm Password</label>
						<input type="password" class="form-control" name="confirm_password" required/>
					</div>

					<?php if (validation_errors()) { ?>
						<div class="alert alert-danger">
							<?php echo validation_errors(); ?>
						</div>
					<?php } ?>

					<button type="submit" name="submit" class="btn btn-outline-primary">Register</button>

				</div>
			</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</main>
