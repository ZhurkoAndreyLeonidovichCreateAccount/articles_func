<?php
    redirectIfNoReg($user);
    $id = (int)URL_PARAMS['id'];
    
    $res = removeArticle($id);
    
    
    $pageTitle = "Delete";
    $pageContent = template("articles/v_delete", ['res' => $res]);
   
?>