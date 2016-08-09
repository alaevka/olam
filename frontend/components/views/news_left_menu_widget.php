<ul class="lft_mnu">
	<?php foreach($news_categories as $category) : ?>
		<li <?php if($category->id == $current_category) { ?>class="active"<?php } ?>><a href="/news/<?= $category->slug; ?>"><?= $category->title; ?></a></li>
	<?php endforeach; ?>
</ul>