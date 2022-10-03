<?php

require_once dirname(__DIR__, 2) . "/lib/Repository/AbstractRepository.php";
require_once dirname(__DIR__) . "/Model/User.php";

class UserRepository extends AbstractRepository
{
    public function findByUsername($username)
    {
        $query = "SELECT * FROM user WHERE username = :username;";
        $params = [":username" => $username];
        return $this->executeQuery($query, "User", $params);
    }

    public function add(User $user)
    {
        $query = "INSERT INTO user(`lastname`,`firstname`,`username`,`password`)
                    VALUES(:lastname, :firstname, :username, :password);
                ";
        $params = [
            ":lastname" => $user->getLastname(),
            ":firstname" => $user->getFirstname(),
            ":username" => $user->getUsername(),
            ":password" => $user->getPassword()
        ];
        return $this->executeQuery($query, "User", $params);
    }

    public function find(int $id)
    {
        $query = "SELECT * FROM user WHERE id = :id;";
        $params = [":id" => $id];

        return $this->executeQuery($query, "User", $params);
    }
}