<main class="container">

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item"><a href="/news">News</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $newsItem['title'] ?></li>
		</ol>
	</nav>

	<h2><?php echo $newsItem['title'] ?></h2>

	<p><?php echo $newsItem['text']; ?></p>

</main>
