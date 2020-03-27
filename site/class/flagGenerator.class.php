<?php 

//Singleton

/*

*/
class FlagGenerator
{
    private static $instance = null;
    private $salt;
    private $flag;
    
    private function __construct() {
            $this->randomizeTimezone();
            
            $this->salt = hash('sha512',date('Y-m-d h:i:sa'));
            
            $flagName = ['IJT_SQL', 'XSS', 'CSRF', 'IJT_CODE', 'IJT_OS', 'OOB_LOOP', 'INC_LOCAL', 'INC_EXT', 'UPLOAD', 'SIG_VIEW', 'PWD_BRUTE',];
            
            foreach($flagName as $value)
            {
                $this->flag[] = [$value => $this->getFlag($value)];
            }
            
            foreach($this->flag as $value)
            {
                foreach($value as $name => $key)
                {
                    echo $name;
                    echo " => ";
                    echo $key;
                    echo "</br>";
                }
            }
            
            date_default_timezone_set('Europe/Paris');
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
    
    private function getFlag($name)
    {
        return  hash('sha512', $this->salt.$name);
    }
    
    static private function isExists()
    {
        require_once(realpath('./').'/class/database/management.model.class.php');
        
        $data = Management::selectFrom('flag');
        //INSERT INTO `apchlz_flag` (`id_flag`, `flag_name`, `flag_key`, `flag_encrypt`, `flag_view`) VALUES (NULL, 'dd', 'dd', 'dd', '1');
        Management::insertInto('flag',array('id_flag', 'flag_name', 'flag_key', 'flag_encrypt', 'flag_view'), array(NULL, 'dd', 'dd', 'dd', '1'));
    }
    
    public static function initInstance() 
    {
        if(is_null(self::$instance)) {
            self::isExists();
            self::$instance = new FlagGenerator();  
        }
   }
}


?>