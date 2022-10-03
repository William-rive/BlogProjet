<?php

require_once dirname(__DIR__, 2) . "/lib/Repository/AbstractRepository.php";
require_once dirname(__DIR__) . "/Model/Article.php";

class ArticleRepository extends AbstractRepository
{

    public function findAll()
    {
        $query = "SELECT * FROM article;";
        return $this->executeQuery($query , "Article");
    }

    public function find(int $article_id)
    {
        $query = "SELECT * FROM article WHERE id = :id;";
        $params = [":id" => $article_id];
        return $this->executeQuery($query, "Article", $params);
    }
}