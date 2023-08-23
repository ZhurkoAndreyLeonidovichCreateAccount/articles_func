<?php 
    $categories = getCategories();
    $pageTitle = 'All articles';

    $pageContent = template("categories/v_index", ['categories' => $categories]);