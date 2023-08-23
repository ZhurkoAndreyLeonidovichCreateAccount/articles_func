<?php

    $pageTitle = 'Article';
    $id = (int)URL_PARAMS['id'];
    $post = getArticleById($id) ?? null;
    $isAdded = false;
    if(isset($_SESSION['article.add'])){
        $isAdded = true;
        unset($_SESSION['article.add']);
    }
    if($post !== null){
        $isAddMenu = false;
        if($user !== null){
            $isAddMenu = $user['id_user'] === $post['id_user'];
        }
        $category = getCategoryById($post['id_category']);
        $menu = template('articles/v_article_menu', ['id'=>$id]);
        $content = template("articles/v_article", ['post' => $post, 'id' => $id, 'category' => $category, 'isAdded' => $isAdded]);
        $pageContent = template('base/v_con2col', [
            'left' => $isAddMenu ? $menu : '',
            'content' =>$content,
            'title' => 'One article'
        ]);
    }
    else{
        header('HTTP/1.1 404 Not Found');
        $pageContent = template('errors/v_404');
    }
    ?>