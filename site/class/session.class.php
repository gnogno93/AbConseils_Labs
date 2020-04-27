<?php 

class Session
{   
    public function __construct()
    {
    }
    
    static function sessionStart($userDataArray)
    {

        if(session_status() !== PHP_SESSION_ACTIVE) session_start();
        if(is_array($userDataArray) && !empty($userDataArray))
        {
            foreach($userDataArray as $key => $value)
            {
                var_dump($key);
                $_SESSION[$key] = $value;
            }
        }
    }
    static function sessionStop()
    {
        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
            session_destroy();
            $_SESSION = array();
        }
        //session_id_to_destroy
    }
}

?>