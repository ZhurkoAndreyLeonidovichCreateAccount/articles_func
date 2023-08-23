<?php 
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $fields = extractFields($_POST, ['title']);
    $validateErrors = categoryValidate($fields);
        if(empty($validateErrors)){
            addCategory($fields);
            $lastId = dbLastId();

            //header("Location: category/$lastId");
            header('Location:' . BASE_URL . 'all');
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
    $pageContent = template("categories/v_add", [
        'fields' => $fields, 
        'validateErrors' => $validateErrors,
        
    ]);