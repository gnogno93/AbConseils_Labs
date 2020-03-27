<?php 



class FlagsLoader 
{
    private static $instance = null;
    
    public function __construct($flagsName) {
        
    }
    
    public static function initInstance() 
    {
        require_once(realpath('./').'/class/flagsGenerator.class.php');
        
        FlagsGenerator::initInstance();
        $instanceOfGenerator = FlagsGenerator::getInstance();
        if(is_null(self::$instance) && $instanceOfGenerator instanceof FlagsGenerator) {
            self::$instance = new FlagsLoader($instanceOfGenerator->getFlagsName);  
        }
    }
   
}


?>