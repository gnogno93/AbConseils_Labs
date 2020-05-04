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
define('DB_DATABASE', 'test');

/*
* WARNING: do not delete the comment below 
* it will be changed automatically at first start with the prefix
* without prefix the database will be lost or will not be created
*/

define('DB_PREFIX', 'aPChLZ_');
//define('DB_PREFIX', null); // autoChange

require_once(dirname(__FILE__).'../../../function/prefix.function.php');


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
    
    static private function useDatabase($db_name)
    {
         if(!(self::isConnected() && self::prefixExists()))
         {
           return false;
         }
         
         if(!empty($db_name))
         {
            $db_bind = self::$db_connect->prepare("USE $db_name");
            $db_bind->execute();
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
        if(!$ptr = fopen($file, "r")) fclose($ptr); return;
        if(!$content = fread($ptr, filesize($file))) fclose($ptr); return;
            
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
        if(!$ptr = fopen($file, 'w')) fclose($ptr);  return;
            
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

        
        try 
        {
            if(is_array(self::$db_name))
            {
                foreach(self::$db_name as $value)
                {
                    if(!empty($value) && is_string($value))
                    {
                        $db_bind = self::$db_connect->prepare("CREATE DATABASE IF NOT EXISTS $value CHARACTER SET utf8 COLLATE utf8_general_ci");
                        $db_bind->execute();
                    }
                }
            } else {
                $data = self::$db_name;
                $db_bind = self::$db_connect->prepare("CREATE DATABASE IF NOT EXISTS $data CHARACTER SET utf8 COLLATE utf8_general_ci");
                $db_bind->execute();
            }
        } catch(PDOExeception $error){
            // html error 
            echo 'Connection failed '. $error->getMessage();
        } 
    }
    
    static public function createBase()
    {
        if(!(self::isConnected() && self::prefixExists()))
        {
           return false;
        } 
        
        try 
        {
            $admin = self::selectFrom('users','user_login','user_login','administrator');
            if(empty($admin))
            {
                $schema = file_get_contents(dirname(__FILE__).'/schema.json');
                $schema = json_decode($schema); 
            
                self::useDatabase('test');
            
                if(!empty($schema->DATABASE))
                {
                    foreach($schema->DATABASE as $key => $value)
                    {
                        $data = str_replace('{prefix}', self::$db_prefix, $value);
                        $db_bind = self::$db_connect->prepare($data);
                        $db_bind->execute();
                    }
                }
                $schema = file_get_contents(dirname(__FILE__).'/info.json');
                $schema = json_decode($schema);
                date_default_timezone_set('UTC');
                if(!empty($schema->BASE_MEMBER))
                {
                    foreach($schema->BASE_MEMBER as $key => $value)
                    {
                        if(!empty($value))
                        {
                            $data = str_replace('{prefix}', self::$db_prefix, $value);
                            $data = str_replace('{datetimeutc}', date('Y-m-d H:i:s'), $data);
                            $data = str_replace('{passwd}', hash('sha512',date('Y-m-d h:i:sa')), $data);
                            $db_bind = self::$db_connect->prepare($data);
                            $db_bind->execute();
                        }
                    }
                }
                if(!empty($schema->BASE_COMMENT))
                {
                    foreach($schema->BASE_COMMENT as $key => $value)
                    {
                        if(!empty($value))
                        {
                            $data = str_replace('{prefix}', self::$db_prefix, $value);
                            $data = str_replace('{datetimeutc}', date('Y-m-d H:i:s'), $data);
                            $db_bind = self::$db_connect->prepare($data);
                            $db_bind->execute();
                        }
                    }
                }
                
            }
            // next step
        } catch(PDOExeception $error){
            // html error 
            echo 'Connection failed '. $error->getMessage();
        } 
    }
    /*
        sql injection
    */
    static public function selectFrom_IJT_SQL($table, $column = '*', $where = '1=1', $db_name = null)
    {
        if(!(self::isConnected() && self::prefixExists()) && !empty($table))
        {
           return false;
        } 
        
        if(!is_array($db_name) && empty($db_name))
        {
            $db_name = self::$db_name;
        }
        
        self::useDatabase($db_name);
        
        $db_bind = self::$db_connect->prepare('SELECT '.$column.' FROM '.self::$db_prefix.$table.' WHERE '.$where);
        $db_bind->execute();
        return $db_bind->fetchAll(PDO::FETCH_CLASS);
    }
    
    static public function selectFrom($table, $column = '*', $whereColumn = '1', $whereData='1', $db_name = null)
    {
        if(!(self::isConnected() && self::prefixExists()) && !empty($table))
        {
           return false;
        } 
        
        if(!is_array($db_name) && empty($db_name))
        {
            $db_name = self::$db_name;
        }
        
        self::useDatabase($db_name);
        $db_bind = self::$db_connect->prepare('SELECT '.$column.' FROM '.self::$db_prefix.$table.' WHERE '.$whereColumn.'=:whereData');       
        $db_bind->bindParam(':whereData', $whereData, PDO::PARAM_STR);
        $db_bind->execute();
 
        $result = $db_bind->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    
    static public function insertInto($table, $column, $data, $db_name = null)
    {
        if(!(self::isConnected() && self::prefixExists()) && !empty($table))
        {
           return false;
        } 
        
        if(!is_array($db_name) && empty($db_name))
        {
            $db_name = self::$db_name;
        }
        self::useDatabase($db_name);
        
        if(empty($data) && empty($column))
        {
            return false;
        }
        
        if(is_array($data) && is_array($column) && count($column) == count($data))
        { 
            $newData = implode(",:", $column);
            $newColumn = implode(",", $column);
            
            $db_bind = self::$db_connect->prepare('INSERT INTO '.self::$db_prefix.$table.'('.$newColumn.') VALUE (:'.$newData.')');  

            for($i = 0; $i<count($column); $i++)
            { 
                $oneColumn = ':'.$column[$i];
                $db_bind->bindParam($oneColumn, $data[$i]);
            }
            
            $db_bind->execute();
            //print_r($db_bind->errorInfo());
            
        } else{
            return false;
        }
    }
    
    static public function updateSet()
    {
    }
    

    
    
}

?>