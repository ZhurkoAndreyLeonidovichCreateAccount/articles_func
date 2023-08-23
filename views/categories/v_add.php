<h1>Add category</h1>
<div class="form">
    <form method = "POST">
       
        Title:<br>
        <input type = "text" name = "title" value="<?=$fields['title']?>"><br>
        <input type="submit" value="Отправить" />
        <div class="error-list">
		<? foreach($validateErrors as $error): ?>
			<p><?=$error?></p>
		<? endforeach; ?>
		</div>
    </form>
</div>
<hr>
<a href="<?=BASE_URL?>">Move to main page</a>