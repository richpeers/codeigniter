<main class="container">


	<div class="row">
		<div class="col-md-8 offset-md-2 mt-4">

			<?php echo form_open('/news/create'); ?>

			<div class="card bg-light">
				<div class="card-header">
					Create News Item
				</div>
				<div class="card-body">
					<div class="form-group">
						<label class="control-label" for="title">Title</label>
						<input type="text" class="form-control" name="title"/>
					</div>

					<div class="form-group">
						<label class="control-label" for="text">Text</label>
						<textarea class="form-control" rows="5" name="text"></textarea>
					</div>

					<div class="text-danger">
						<?php echo validation_errors(); ?>
					</div>

					<button type="submit" name="submit" class="btn btn-outline-success">Save</button>
					<a href="/news" class="btn btn-outline-danger ml-2">Cancel</a>

				</div>

			</div>

			</form>
		</div>
	</div>


</main>
