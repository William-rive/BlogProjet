<?php 

require_once dirname(__DIR__) . "/Repository/UserRepository.php";

class Service
{
    /**
     * @return bool
     */
    public static function checkIfUserIsConnected(): bool
    {   
        $userIsConnected = false;
        $userRepository = new UserRepository();

        if (
            isset($_SESSION["user_is_connected"], $_SESSION["user_id"])
            && $_SESSION["user_is_connected"]
            && $userRepository->find(intval($_SESSION["user_id"]))
        ) {
            $userIsConnected = true;
        }
        return $userIsConnected;
    }

    /**
     * 
     */
}