<?php
    redirectIfNoReg($user);
    $id = (int)URL_PARAMS['id'];
    $post = getArticleById($id) ?? null;
    if( $post === null){
        header('HTTP/1.1 404 Not Found');
        $pageContent = template('errors/v_404');
    }
   
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fields = extractFields($_POST, ['title', 'content']);
        $validateErrors = articleValidate($fields);
        if(empty($validateErrors)){       
            editArticle($id, $fields['title'], $fields['content']);
            header("Location:" . BASE_URL . "articles/article/$id");
            exit();
        }
        else{
            $article = $fields;
        }      
    }
    else{
        $article = $post;
        $validateErrors = [];
    }
    $pageTitle = 'Edit';
    $pageContent = template('articles/v_edit', [
        'article' => $article, 
        'validateErrors' => $validateErrors
        ]);
?>


    