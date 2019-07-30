<main class="container">

	<h2 class="d-inline-block">News Archive</h2>

	<?php if ($auth->check()) { ?>
		<a href="/news/create" class="btn btn-outline-primary float-right">Create</a>
	<?php } ?>

	<div class="row pt-2">
		<?php foreach ($news as $newsItem): ?>

			<div class="col-md-4">
				<div class="card bg-light mb-4">
					<div class="card-body">
						<h5 class="card-title"><?php echo $newsItem['title']; ?></h5>
						<p class="card-text"><?php echo $newsItem['text']; ?></p>
						<a href="<?php echo site_url('news/' . $newsItem['slug']); ?>">View article</a>
					</div>
				</div>
			</div>


		<?php endforeach; ?>
	</div>
</main>
