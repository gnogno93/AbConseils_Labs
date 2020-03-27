<?php 

class FlagsWriter
{
    private $flagsPath;
    private $flagsName;
    
    public function __construct($flagsName)
    {
        $this->flagsName = $flagName;
        
        foreach($this->flagsName as $value)
        {
            $this->flagsPath = array($value => 'class/database/schema');
            
        }
        var_dump($this->flagsPath);
    }
    

}

?>