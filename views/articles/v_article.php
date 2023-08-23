<div class="content">
	<?if($isAdded):?>
		<div class = "alert alert-success">
			<p>Статья добавлена</p>
		</div>
	<?endif;?>	
		<div class="article">
			<h3><?=$post['title']?></h3>
			<div><strong>Article author: </strong><?= $post['login']?></div>
			<hr>
			<div><?=$post['content']?></div>
            <p><?=$post['dt_add']?></p>
			<p><a href = "<?=BASE_URL?>categories/allArticlesByCategory/<?=$category['id_category']?>"><?=$category['title']?></a></p>		
</div>
<hr>
<a href="<?=BASE_URL?>">Move to main page</a>