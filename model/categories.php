<?php
    function getCategories(): array{
        $sql = "SELECT * FROM categories ORDER BY title";
        $categories = dbQuery($sql)->fetchAll();
        return $categories;
    }

    function getCategoryById(int $id): ?array{
        $sql = "SELECT * FROM categories WHERE id_category = :id";
        $article = dbQuery($sql,['id'=>$id])->fetch();
        return is_array($article) ? $article : null;

    }

    function addCategory($fields): bool{
        //var_dump($fields);
        $sql = "INSERT INTO categories (title) VALUES(:title)";
        dbQuery($sql, $fields);
        return true;
    }
    function editCategory(int $id, string $title):bool{
        $sql = "UPDATE categories SET title = :title WHERE id_category = :id";
        dbQuery($sql,['title' => $title,  'id' => $id]);
        return true;
    }

    function removeCategory(int $id):bool{
        $sql = "DELETE FROM categories WHERE id_category = $id";
        dbQuery($sql);
        return true;
      }

    function categoryValidate(array $fields):array{
        $errors = [];
        $textLen = mb_strlen($fields['title'], 'UTF-8');
        if($fields['title'] === ''){
			$errors[] = 'Заполните все поля!';
		}

        if(mb_strlen($fields['title'], 'UTF-8') < 2){
            $errors[] = 'Имя не короче 2 символов!';
        }

        $fields['title'] = htmlspecialchars($fields['title']);
		

        return $errors;
    }

    

?>