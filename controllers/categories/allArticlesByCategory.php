<?php 
    $id = (int)URL_PARAMS['id'];
    $articles = getAllArticlesbyIdCategory($id) ?? null;
    if($articles !== null){
        $category = getCategoryById($id)['title'];
        $pageTitle = "All articles about $category";
        $pageContent = template("articles/v_index", ['articles' => $articles]);
    }
    else{
        header('HTTP/1.1 404 Not Found');
        $pageContent = template('errors/v_404');
    }
    ?>
    

