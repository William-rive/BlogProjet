<?php 

require_once dirname(__DIR__, 2) . "/lib/Controller/AbstractController.php";
require_once dirname(__DIR__) . "/Repository/ArticleRepository.php";
require_once dirname(__DIR__) . "/Repository/CategoryRepository.php";
require_once dirname(__DIR__) . "/service/Service.php";

class ArticleController extends AbstractController
{
    /**
     * @var ArticleRepository $articleRepository
     */
    private ArticleRepository $articleRepository;

    /**
     * @var CategoryRepository $categoryRepository
     */
    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
        $this->categoryRepository = new CategoryRepository();
    }


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
            $userRepository = new UserRepository();
            $categoryRepository = new CategoryRepository();
            $article = $this->articleRepository->find(intval($_GET["article_id"]));
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
            $message = null;
            $error = null;
            if (
                $_POST
                && isset($_POST["title"], $_POST["content"], $_POST["categories"], $_FILES["image"])
                && strlen($title = trim($_POST["title"]))
                && strlen($content = trim($_POST["content"]))
                && count($categories = $_POST["categories"])
                && $categories = Service::checkCategoriesExist($_POST["categories"])
            ) {
                $file_path_image = Service::moveFile($_FILES["image"]);
                $article = new Article();
                $article->setTitle($title);
                $article->setContent($content);
                $article->setDate_published((new DateTime("now"))->format("Y-m-d H:i:s"));
                $article->setUser_id(intval($_SESSION["user_id"]));
                $article->setFile_path_image($file_path_image);

                $this->articleRepository->add($article);
                $article = $this->articleRepository->findLast();
                foreach ($categories as $key => $category) 
                {
                    $this->articleRepository->insertArticleCategory($article, $category);
                }
                header("Location: /?page=article");
            }
            return $this->renderView(
                "/template/article/article_add.php",
                [
                    "error" => $error,
                    "message" => $message,
                    "categories" => $categoryRepository->findAll()
                ]
            );
        }
        header("Location: /?page=home");
    }

    /**
     * @Route article_deleted
     */
    public function deleted()
    {
        if (
            Service::checkIfUserIsConnected()
            && isset($_GET["article_id"])
            && $article = $this->articleRepository->find(intval($_GET["article_id"]))
            ) 
        {
            $this->articleRepository->deletedArticleCategory($article);
            unlink(dirname(__DIR__, 2) . "//public/" . $article->getFile_path_image());
            $this->articleRepository->deleted($article);
        }
        header("Location: /?page=article");
    }

    /**
     * @Route article_update
     */
    public function update()
    {   
        if (Service::checkIfUserIsConnected() && isset($_GET["article_id"])) {
            
            $article = $this->articleRepository->find($_GET["article_id"]);

            if($_POST && isset($_POST["title"], $_POST["content"], $_POST["categories"])
            && $_FILES["image"]
            && strlen($title = trim($_POST["title"]))
            && strlen($content = trim($_POST["content"])))
            {   
                $file_path_image = $article->getFile_path_image();
                if ($_FILES["image"]["size"])
                {
                    $file_path_deleted = dirname(__DIR__, 2) . "//public/" . $article->getFile_path_image();
                    if (file_exists($file_path_deleted)) {
                        unlink($file_path_deleted);
                    }
                    $file_path_image = Service::moveFile($_FILES["image"]);
                }
                $article->setTitle($title);
                $article->setContent($content);
                $article->setFile_path_image($file_path_image);
                $this->articleRepository->update($article);
                $this->articleRepository->deletedArticleCategory($article);
                $categories = Service::checkCategoriesExist($_POST["categories"]);
                foreach ($categories as $key => $category) 
                {
                    $this->articleRepository->insertArticleCategory($article, $category);
                }

            }
            $this->renderView("/template/article/article_update.php",
                [
                    "article" => $article,
                    "categories" => $this->categoryRepository->findAll(),
                    "article_category" => $this->categoryRepository->findByArticle($article)
                ]
            );
        }
    }

}