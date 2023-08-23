<?php
    $id = (int)URL_PARAMS['id'];
    
    $res = removeCategory($id);
    
    
    $pageTitle = "Delete";
    $pageContent = template("categories/v_delete", ['res' => $res]);
   
?>