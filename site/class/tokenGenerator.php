<?php 

define('MODE', 'AES-128', 'AES-256', 'AES-512');

require_once(realpath('./').'/function/timeRandomizer.function.php');
require_once(realpath('./').'/function/prefix.function.php');

class TokenGenerator
{
    private $salt;
    private $MODE = MODE;
    private $psw;
    
    
    public function __construct()
    {
        
    }
    
    static public function createCRSFToken($psw)
    {
       //AES implémentation  
    }   
        
    static public function simpleToken()
    {
       $value = hash('sha512',date('Y-m-d h:i:sa').prefix(10));
       return self::simpleToken($value);
    }

    static public function simpleToken($value)
    {
        $this->salt = hash('sha512',date('Y-m-d h:i:sa'));
        return hash(hash('sha512', $value.$this->salt);
    }
    
}

?>