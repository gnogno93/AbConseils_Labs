<?php 

//Singleton

define('ENCRYPT', null);
//define('MODE', 'AES-128');
//define('MODE', 'AES-256');
//define('MODE', 'AES-512');
require_once(realpath('./').'/class/database/management.model.class.php');
/*
*
*/
class FlagsGenerator
{
    static private  $instance = null;
    private $salt;
    private $flags;
    private $flagsName;
    private $flagsValue;
    private $encrypt = ENCRYPT;
    
    private function __construct() {
            $this->randomizeTimezone();
            
            $this->salt = hash('sha512',date('Y-m-d h:i:sa'));
            
            $this->flagsName = ['IJT_SQL', 'XSS', 'CSRF', 'IJT_CODE', 'IJT_OS', 'OOB_LOOP', 'INC_LOCAL', 'INC_EXT', 'UPLOAD', 'SIG_VIEW', 'PWD_BRUTE',];
            
            foreach($this->flagsName as $value)
            {
                $hashFlag = $this->getHashFlags($value);
                $this->flagsValue[] = $hashFlag;
                $this->flags[] = [$value => $this->getHashFlags($hashFlag)];
            }
            
            $this->insertFlags();
            
            date_default_timezone_set('Europe/Paris');
    }
    
    public function getFlagsName()
    {
        return $this->flagsName;
    }
    
    public function getFlagsValue()
    {
        return $this->flagsValue;
    }
    
    private function insertFlags()
    {
        $column = array('flag_name', 'flag_key', 'flag_encrypt', 'flag_view');
        if(!is_array($this->flags) && empty($this->flags))
            return;
       
        foreach($this->flags as $value)
        {
            foreach($value as $name => $key)
            {
                Management::insertInto('flags',$column, array($name, $key, '', '0'));
            }
        } 
    }
    
    private function randomizeTimezone()
    {
        $strTimeZone = ['America/New_York', 'Europe/Paris', 
                        'Antarctica/Casey', 'Arctic/Longyearbyen', 
                        'Asia/Tokyo','Pacific/Wake', 
                        'Pacific/Gambier', 'Atlantic/St_Helena'
                        ,'Australia/Darwin', 'Indian/Comoro'
                        ,'Asia/Dubai', 'Asia/Yekaterinburg'
                        ,'Europe/Kiev', 'Europe/Isle_of_Man'];
                        
        date_default_timezone_set($strTimeZone[random_int (0 , count($strTimeZone)-1)]);
    }
    
    private function getHashFlags($name)
    {
        return  hash('sha512', $this->salt.$name);
    }
    
    static private function isExists()
    {   
        $data = Management::selectFrom('flags');
        if(empty(Management::selectFrom('flags')))
        {
            return true;
        } else{
            return false;
        }
    }
    
    static public function getInstance()
    {
        return self::$instance;
    }
   
    static public  function initInstance() 
    {
        if(is_null(self::$instance) && self::isExists()) {
            self::$instance = new FlagsGenerator();            
        }
   }
}


?>