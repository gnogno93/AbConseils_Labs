<?php 

class Session
{   
    public function __construct()
    {
    }
    
    static function sessionStart($userObject)
    {
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();
        if(!empty($userObject) && is_object($userObject))
        {
            $_SESSION['id_user'] = $userObject->id_user;
            $_SESSION['user_login'] = $userObject->user_login;
            $_SESSION['user_email'] = $userObject->user_email;
            $_SESSION['user_first_name'] = $userObject->user_first_name;
            $_SESSION['user_last_name'] = $userObject->user_last_name;
            $_SESSION['user_registered_UTC'] = $userObject->user_registered_UTC;
            $_SESSION['user_status'] = $userObject->user_status;
            $_SESSION['user_role'] = $userObject->user_role;
            return true;
        } else {
            return false;
        }
    }
    static function sessionStop()
    {
        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
            session_destroy();
            $_SESSION = array();
        }
        header('Location: home');
        //session_id_to_destroy
    }
}

?>