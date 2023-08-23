<?php
    
    $id = (int)URL_PARAMS['id'];
    $post = getCategoryById($id) ?? null;
    if( $post === null){
        header('HTTP/1.1 404 Not Found');
        $pageContent = template('errors/v_404');
    }
   
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fields = extractFields($_POST, ['title']);
        $validateErrors = categoryValidate($fields);
        if(empty($validateErrors)){       
            editCategory($id, $fields['title']);
            header("Location: /php1/lesson7/hard_rout_hw/categories/category/$id");
            exit();
        }
        else{
            $category = $fields;
        }      
    }
    else{
        $category = $post;
        $validateErrors = [];
    }
    $pageTitle = 'Edit';
    $pageContent = template('categories/v_edit', [
        'category' => $category, 
        'validateErrors' => $validateErrors
        ]);
?>


    