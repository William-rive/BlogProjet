<?php

require_once dirname(__DIR__) . "/Controller/HomeController.php";
require_once dirname(__DIR__) . "/Controller/ContactController.php";
require_once dirname(__DIR__) . "/Controller/ArticleController.php";
require_once dirname(__DIR__) . "/Controller/UserController.php";


/**
 * Constant stockant le routing de l'application, si on veut rajouter une url c'est ici
 */
const ROUTING = [
    "home" => [
        "controller" => "HomeController",
        "action" => "index"
    ],
    "contact" => [
        "controller" => "ContactController",
        "action" => "index"
    ],
    "article" => [
        "controller" => "ArticleController",
        "action" => "index"
    ],
    "article_show" => [
        "controller" => "ArticleController",
        "action" => "show"
    ],
    "article_add" => [
        "controller" => "ArticleController",
        "action" => "add"
    ],
    "user_add" => [
        "controller" => "UserController",
        "action" => "add"
    ],
    "user_connexion" => [
        "controller" => "UserController",
        "action" => "connect"
    ],
    "user_disconnect" => [
        "controller" => "UserController",
        "action" => "disconnect"
    ]
];

/**
 * function vérifiant l'existence d'une page avant d'instancier le bon controleur définie dans ROUTING
 */
function getRouteFromUrl():void
{
    $path = ROUTING["home"];
    if (isset($_GET["page"]) && isset(ROUTING[$_GET["page"]]))
    {
        $path = ROUTING[$_GET["page"]];
    }
    
    $controller = new $path['controller'];
    $controller->{$path['action']}();
}
