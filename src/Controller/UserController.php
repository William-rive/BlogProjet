<?php

require_once dirname(__DIR__, 2) . "/lib/Controller/AbstractController.php";
require_once dirname(__DIR__) . "/Repository/UserRepository.php";

class UserController extends AbstractController
{

    /**
     * @Route user_add
     */
    public function add()
    {
        $message = "";
        $error = null;
        if (
            $_POST && isset($_POST["lastname"], $_POST["firstname"], $_POST["username"], $_POST["password"])
            ) {
                $message ="Erreur: les informations ne sont pas valide.";
                $error = false;
                $userRepository = new UserRepository();
                if ( strlen($lastname = trim($_POST["lastname"]))
                && strlen($firstname = trim($_POST["firstname"]))
                && strlen($username = trim($_POST["username"]))
                && strlen($password = trim($_POST["password"]))
                && !$userRepository->findByUsername($username)
                ) {
                    $user = new User();
                    $user->setLastname($lastname);
                    $user->setFirstname($firstname);
                    $user->setUsername($username);
                    $user->setPassword(password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]));

                    $userRepository->add($user);
                    $message ="Utilisateur créé.";
                    $error = true;
                } 

            }
        
        return $this->renderView("/template/user/user_add.php", [
            "message" => $message,
            "error" => $error
        ]);
    }

    /**
     * @Route user_connexion
     */
    public function connect()
    {   
        $error = null;
        $message = null;
        if (
            $_POST
            && isset($_POST["username"], $_POST["password"])
            && strlen($username = trim($_POST["username"]))
            && strlen($password = trim($_POST["password"]))
            ) { 
                $error = false;
                $message = "Erreur de connexion";
                $userRepository = new UserRepository();
                $user = $userRepository->findByUsername($username);
                if (password_verify($password, $user->getPassword()))
                {
                    $_SESSION["user_is_connected"] = true;
                    $error = true;
                    $message = "Utilisateur connecté.";
                    header("Location: /?page=home");
                }

        }
        return $this->renderView("/template/user/user_connexion.php", [
            "error" => $error,
            "message" => $message
        ]);
    }

    /**
     * @Route user_disconnect
     */
    public function disconnect()
    {
        if (isset($_SESSION["user_is_connected"]) && $_SESSION["user_is_connected"])
        {
            unset($_SESSION["user_is_connected"]);
            header("Location: /?page=home");
        }
    }
}