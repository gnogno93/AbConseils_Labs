<?php 

class Search
{
    private $searchList;
    private $searchName;
    
    public function __construct()
    {
        $this->searchList = $this->getSearchList();
        $this->searchName = (isset($_GET['search'])) ? htmlentities($_GET['search']) : NULL; 
        $this->rewrite();        
    }
    private function getSearchList()
    {
        // name =>  uri
        return [
            'documentation' => 'documentation',
            'home' => 'home',
            'download' => 'download',
            'sign-up' => 'sign-up',
            'sign-in' => 'sign-in',
            'account' => 'account',
            'faq' => 'faq',
            'schema' => 'schema',
        ];
    }
    public function rewrite()
    {
        foreach($this->searchList as $key => $value)
        {
            
            if($key == $this->searchName)
            {
               header("Location: $value");
               die;
            }
        }
        header('Location: home');
        // failling
    }
}

$search = new Search();


?>