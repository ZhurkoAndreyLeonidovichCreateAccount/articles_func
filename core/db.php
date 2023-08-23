<?php
    function dbInstance(): PDO{
        static $db;
        if($db === null){
            $db = new PDO('mysql:host=localhost;dbname=php1-hw4','root', '', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            $db ->exec('SET NAMES UTF8');
        }
        return $db;
    }

    function dbQuery(string $sql, array $params = []):PDOStatement{
        $db = dbInstance();
        $query = $db->prepare($sql);
        $query->execute($params);
        dbCheckError($query);
        return $query;
    }

    function dbCheckError(PDOStatement $query):bool{
        $errorInfo = $query->errorInfo();
        if($errorInfo[0] !== PDO::ERR_NONE){
           echo $errorInfo[2];
           exit();
        }
        return true;  
    }

    function dbLastId():int {
        $db = dbInstance();
        $lastId = $db->lastInsertId();
        return $lastId;
   }
?>