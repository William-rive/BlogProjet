<?php

abstract class AbstractRepository
{
    private const DATABASE_NAME = "mysql:host=localhost;port=3306;dbname=blog_projet;charset=UTF8";
    private const DATABSE_USERNAME = "root";
    private const DATABASE_PASSWORD = "root";

    private function connect()
    {
        return new PDO(self::DATABASE_NAME, self::DATABSE_USERNAME, self::DATABASE_PASSWORD);
    }

    /**
     * @param string $query Request in SQL
     * @param array $params Params [":variableSQL" => "valeur",...]
     * @return query result
     */
    protected function executeQuery(string $query, string $class, array $params = []): mixed
    {
        $result = null;
        $conn = $this->connect();
        $statement = $conn->prepare($query);
        foreach ($params as $key => $param) $statement->bindValue($key, $param); 
        if ($statement->execute())
        {
            strlen($class) && $statement->setFetchMode(PDO::FETCH_CLASS, $class);
            if ($statement->rowCount() === 1 ) $result = $statement->fetch();
            if ($statement->rowCount() > 1 ) $result = $statement->fetchAll();

        }

        
        $conn = null;
        return $result;
    }


}
