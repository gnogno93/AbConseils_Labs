<?php 

require_once(dirname(__FILE__).'/database/management.model.class.php');

class FlagsLoader 
{
    private static $instance = null;
    private $flagsData;
    
    public function __construct($flagsName, $flagsValue) {
        
        $flagsPath = [  
                        '', 
                        '', 
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '/class/database/schema/',
                        '',
                     ];
                     
        for($i = 0; $i < count($flagsName)-1; $i++)
        {
            $this->flagsData[] = [$flagsName[$i] , $flagsValue[$i], $flagsPath[$i]];
        }
        $this->startWritting();
    }
    
    private function startWritting()
    {
        require_once(realpath('./').'/class/flagsWriter.class.php');
        
        foreach($this->flagsData as $value)
        {
            $writer =  new FlagsWriter($value[0], $value[1], $value[2]);
            $writer->run();
            unset($writer);
        }
    }
    
    public static function initInstance() 
    {
        if(!empty(Management::selectFrom('flag')))
        {
            require_once(realpath('./').'/class/flagsGenerator.class.php');
        
            FlagsGenerator::initInstance();
            $instanceOfGenerator = FlagsGenerator::getInstance();
        
            if(is_null(self::$instance) 
                && $instanceOfGenerator instanceof FlagsGenerator 
                && !empty($instanceOfGenerator->getFlagsName())) 
            {
                self::$instance = new FlagsLoader($instanceOfGenerator->getFlagsName(), $instanceOfGenerator->getFlagsValue());  
            }
        }
    }
   
}


?>