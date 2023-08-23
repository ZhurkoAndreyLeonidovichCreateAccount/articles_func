<div class="form">
    <form method = "POST">
        Title:<br>
        <input type = "text" name = "title" value="<?=$article['title']?>"><br>
        Content:<br>
        <input type = "text" name = "content" value="<?=$article['content']?>"><br>
        <button>Send</button>
        <div class="error-list">
		<? foreach($validateErrors as $error): ?>
			<p><?=$error?></p>
		<? endforeach; ?>
		</div>
    </form>
</div>
<hr>
<a href="<?=BASE_URL?>">Move to main page</a>