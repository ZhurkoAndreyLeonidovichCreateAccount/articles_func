<?php
    redirectIfNoReg($user);
    $categories = getCategories();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fields = extractFields($_POST, ['title', 'content', 'category']);
        $validateErrors = articleValidate($fields);
        if(empty($validateErrors)){
            $fields['id_user'] = $user['id_user'];
            addArticle($fields);
            $_SESSION['article.add'] = true;
            $lastId = dbLastId();
            header("Location: article/$lastId");
            exit();
        }					
    }
    else{
        $fields = [
            'title' => '',
            'content' => ''
        ];
        $validateErrors = [];
       
    }

    $pageTitle = 'Add artcile';
    $pageContent = template("articles/v_add", [
        'fields' => $fields, 
        'validateErrors' => $validateErrors,
        'categories' => $categories 
    ]);
    
?>