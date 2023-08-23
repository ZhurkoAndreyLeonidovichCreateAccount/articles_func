<h1>Categories</h1>
<a href = "<?=BASE_URL?>categories/add">Add category</a>
<hr>
<?foreach($categories as $category):?>
<div class="articles">
    <h2><?=$category['title']?></h2>  <a href="<?=BASE_URL?>categories/category/<?=$category['id_category']?>"> Watch category</a> | 
    <a href = "<?=BASE_URL?>categories/allArticlesByCategory/<?=$category['id_category']?>">Wach all articles about topic</a>
</div>
<?endforeach;?>
</hr>