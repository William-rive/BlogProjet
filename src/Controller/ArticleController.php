<?php 

require_once dirname(__DIR__, 2) . "/lib/Controller/AbstractController.php";
require_once dirname(__DIR__) . "/Repository/ArticleRepository.php";
require_once dirname(__DIR__) . "/Repository/UserRepository.php";
require_once dirname(__DIR__) . "/Repository/CategoryRepository.php";
require_once dirname(__DIR__) . "/service/Service.php";

class ArticleController extends AbstractController
{

    /***
    * @Route article
    */
    public function index()
    {
        $articles = [];
        $articleRepository = new ArticleRepository();
        $articles = $articleRepository->findAll();


        return $this->renderView("/template/article/article_base.php",
            [
                "articles" => $articles
            ]);
    }

    /**
     * @Route article_show
     */
    public function show()
    {  
        if (isset($_GET["article_id"]))
        {
            $articleRepository = new ArticleRepository();
            $userRepository = new UserRepository();
            $categoryRepository = new CategoryRepository();
            $article = $articleRepository->find(intval($_GET["article_id"]));
        }
        return $this->renderView("/template/article/article_show.php",
            [
                "article" => $article,
                "user" => $userRepository->find(intval($article->getUser_id())),
                "categories" => $categoryRepository->findByArticle($article)
            ]);
    }

    /**
     * @Route article_add
     */
    public function add()
    {   
        
        if (Service::checkIfUserIsConnected())
        {
            $categoryRepository = new CategoryRepository();
            if (
                $_POST 
                && isset($_POST["title"], $_POST["content"], $_POST["categories"], $_FILES["images"])
                && strlen($title = trim($_POST["title"]))
                && strlen($content = trim($_POST["content"]))
                
            ) {

            }
            return $this->renderView("/template/article/article_add.php",
                [
                    "categories" => $categoryRepository->findAll()
                ]
            );
        }
        header("Location: /?page=home");
    }


}