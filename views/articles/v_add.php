<h1>Add</h1>
<div class="form">
    <form method = "POST">
       Choose category:<br>
        <select class="form-select "  name = "category" id = "category">
            <?foreach ($categories as $category):?>
                <option value="<?=$category['id_category']?>"><?=$category['title']?></option>  
            <?endforeach;?> 
      </select><br>
        Title:<br>
        <input type = "text" name = "title" value="<?=$fields['title']?>"><br>
        Content:<br>
        <input type = "text" name = "content" value="<?=$fields['content']?>"><br>
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