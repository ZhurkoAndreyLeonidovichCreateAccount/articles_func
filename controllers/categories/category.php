<?php
    $id = (int)URL_PARAMS['id'];
    $post = getCategoryById($id) ?? null;
    if($post !== null){
        $category = getCategoryById($post['id_category']);
        $menu = template('categories/v_category_menu', ['id'=>$id]);
        $content = template("categories/v_category", ['post' => $post, 'id' => $id, 'category' => $category]);
        $pageContent = template('base/v_con2col', [
            'left' => $menu,
            'content' =>$content,
            'title' => 'One category'
        ]);
    }
    else{
        header('HTTP/1.1 404 Not Found');
        $pageContent = template('errors/v_404');
    }
    ?>