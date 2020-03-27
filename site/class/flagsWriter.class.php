<?php 

define('EXTENSION', '.flag');

class FlagsWriter
{
    private $flagPath;
    private $flagName;
    private $flagValue;
    
    public function __construct($flagName, $flagValue, $flagPath)
    {
        $this->flagPath = realpath('./').$flagPath;
        $this->flagName = $flagName;
        $this->flagValue = $flagValue;
    }
    
    public function run()
    {
        if($this->check())
        {
            $file = $this->flagPath.$this->flagName.EXTENSION;
            file_put_contents($file, $this->flagValue);
        }
        return false;
    }
    
    private function check()
    {
        if(is_dir($this->flagPath) && $this->flagPath != realpath('./'))
        {    
            return true;
        }
        return false;
    }
    
    private function fileHeader()
    {
        //style .flag
    }

}

?>