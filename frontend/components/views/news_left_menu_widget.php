<ul class="lft_mnu">
	<?php foreach($news_categories as $category) : ?>
		<li><a href="/news/<?= $category->slug; ?>"><?= $category->title; ?></a></li>
	<?php endforeach; ?>
</ul>