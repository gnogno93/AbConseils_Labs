<?php 

/*
* this section must be configured during installation (bastian)
* the configuration below must be modified
* they are configured for a test environment currently
* if no changes are made, it is likely that the connection will never be established
*/

define('DB_SERVER','127.0.0.1:3308');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('DB_DATABASE', ['test', 'test2']);

/*
* WARNING: do not delete the comment below 
* it will be changed automatically at first start with the prefix
* without prefix the database will be lost or will not be created
*/

define('DB_PREFIX', 'aPChLZ_');
//define('DB_PREFIX', null); // autoChange

require_once(realpath('./').'/function/prefix.function.php');


/*
* this class is static
* it represents the database connection as well as the most used requests
* it will first create the database and it is table if it does not exist
* WARNING: it never checks it's input argument to this method
* WARNING: it only checks things used for initialization of the database (schema/prefix/connection)
*/

class Management
{
    static private $db_connect;
    static private $db_name = DB_DATABASE;
    static private $db_prefix = DB_PREFIX;
    
    public function __construct() {
        
    }
    
    static public function connect()
    {
        $db_host = DB_SERVER;
        $db_user = DB_USERNAME;
        $db_pass = DB_PASSWORD;
        
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
           return true;
        } else {
            return true;
        }
    }
    
    static public function prefixExists()
    {
        if(empty(self::$db_prefix))
        {
            self::initPrefix();
            if(empty(self::$db_prefix))
            {
                return false;
            }
            return true;
        } else{
            return true;
        }
    }
    
    static public function initPrefix()
    {
        $file = dirname(__FILE__).'/management.model.class.php';
        if(!is_writable($file) && !is_readable($file)) 
        {
            return;
        }
        if(!$ptr = fopen($file, "r")) return;
        if(!$content = fread($ptr, filesize($file))) return;
            
        fclose($ptr);
            
        $content = explode(PHP_EOL, $content);
        $search = 'autoChange';
        $prefix = prefixWithUnderscore();
        for($i=0; $i<count($content)-1; $i++)
        {
            if(preg_match("/{$search}/i", $content[$i])  ) {;
                $content[$i] = "define('DB_PREFIX', '".$prefix."');";
                break;
            } 
        }
        $content = implode(PHP_EOL, $content);
        if(!$ptr = fopen($file, 'w')) return;
            
        fwrite($ptr, $content);
        fclose($ptr); 
        self::$db_prefix = $prefix;   
    }
    
    static public function createDatabase()
    {
        if(!(self::isConnected() && self::prefixExists()))
        {
           return false;
        } 

        $string = file_get_contents(dirname(__FILE__).'/schema/schema.json');
        $json_a = json_decode($string);
        var_dump($json_a);
        
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
    
    static public function selectFrom()
    {
    }
    
    static public function updateSet()
    {
    }
    

    
    
}

?>