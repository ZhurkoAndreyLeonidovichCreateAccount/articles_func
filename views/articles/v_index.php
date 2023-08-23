<h1>Articles</h1>
<a href = "<?=BASE_URL?>/articles/add">Add article</a>
<hr>
<?foreach($articles as $article):?>
<div class="articles">
    <h2><?=$article['title']?></h2>
    <p><?=$article['dt_add']?></p>
    <a href = "<?=BASE_URL?>articles/article/<?=$article['id_article']?>">Read more</a>
</div>
<?endforeach;?>
</hr>