<?php 

/*
* this section must be configured during installation
*/
define('DB_SERVER','127.0.0.1:3308');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('DB_DATABASE', ['test', 'test2']);

require_once(realpath('./').'/function/prefix.function.php');

class Management
{
    static private $db_connect;
    static private $db_name=DB_DATABASE;
    
    public function __construct() {
        
    }
    
    static public function connect()
    {
        $db_host=DB_SERVER;
        $db_user=DB_USERNAME;
        $db_pass=DB_PASSWORD;
        
        try
        {
            self::$db_connect = new PDO("mysql:host=$db_host", $db_user, $db_pass,  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch(PDOExeception $error){
            // html error 
            echo 'Connection failed '. $error->getMessage();
        } 
    }
    
    static public function isConnected()
    {
        if(empty(self::$db_connect))
        {
           self::connect();
           if(empty(self::$db_connect))
           {
               return false;
           }
           
        } else {
            return true;
        }
    }
    
    static public function createDatabase()
    {
        echo PrefixWithUnderscore(6);
        if(self::isConnected())
        {
           return false;
        }
        
        try 
        {
            foreach(self::$db_name as $value)
            {
                if(!empty($value) && is_string($value))
                {
                    $db_bind = self::$db_connect->prepare("CREATE DATABASE IF NOT EXISTS $value;");
                    $db_bind->execute();
                }
            }
        } catch(PDOExeception $error){
            // html error 
            echo 'Connection failed '. $error->getMessage();
        } 
    }
    
    static public function createTable()
    {
        if(self::isConnected())
        {
           return false;
        }
        
        try 
        {
            // next step
        } catch(PDOExeception $error){
            // html error 
            echo 'Connection failed '. $error->getMessage();
        } 
    }
    
    
}

?>