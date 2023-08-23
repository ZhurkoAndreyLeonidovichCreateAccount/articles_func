<?php

    function getArticles(): array{
        $sql = "SELECT * FROM articles ORDER BY dt_add DESC";
        $articles = dbQuery($sql)->fetchAll();
        return $articles;
    }

    function getArticleById(int $id): ?array{
        $sql = "SELECT articles.*, users.login FROM articles 
        JOIN users ON users.id_user = articles.id_user
        WHERE id_article = :id";
        $article = dbQuery($sql,['id'=>$id])->fetch();
        return is_array($article) ? $article : null;

    }

    function addArticle(array $fields): bool{
        $sql = "INSERT INTO articles (title, content, id_category, id_user) VALUES(:title, :content, :category, :id_user)";
        dbQuery($sql, $fields);
        return true;
    }

    function removeArticle(int $id):bool{
        $sql = "DELETE FROM articles WHERE id_article = $id";
        dbQuery($sql);
        return true;
      }
  
      function editArticle(int $id, string $title, string $content):bool{
          $sql = "UPDATE articles SET title = :title, content = :content WHERE id_article = :id";
          dbQuery($sql,['title' => $title, 'content' => $content, 'id' => $id]);
          return true;
      }

      function getAllArticlesbyIdCategory(int $id){
        $sql = "SELECT * FROM articles WHERE id_category = :id";
        $articles = dbQuery($sql,['id'=> $id])->fetchAll();
        return $articles;
    }

    function articleValidate(array $fields):array{
        $errors = [];
        $textLen = mb_strlen($fields['content'], 'UTF-8');
        if($fields['title'] === '' || $fields['content'] === ''){
			$errors[] = 'Заполните все поля!';
		}

        if(mb_strlen($fields['title'], 'UTF-8') < 2){
            $errors[] = 'Имя не короче 2 символов!';
        }

        if($textLen < 10 || $textLen > 140){
			$errors[] = 'Текст от 10 до 140 символов!';
		}

        $fields['title'] = htmlspecialchars($fields['title']);
		$fields['content'] = htmlspecialchars($fields['content']);

        return $errors;
    }
    
    function checkId($id):bool {
        return !!preg_match('/^[1-9]+\d*$/', $id);
    }
?>