<?php 

require_once(dirname(__FILE__).'../../../function/AES256.function.php');
require_once(dirname(__FILE__).'../../../function/insertFlag.function.php');
require_once(dirname(__FILE__).'../../model/registerModel.class.php');

class RegisterController
{
    private $userName;
    private $userPassword;
    private $userEmail;
    private $userFirstName;
    private $userLastName;
    
    private $registerModel;
    
    private $salt;
    
    
    public function __construct()
    {
        $this->userName = (isset($_POST['user_name'])) ? $_POST['user_name'] : NULL;
        $this->userPassword = (isset($_POST['user_password'])) ? htmlentities($_POST['user_password']) : NULL;
        $this->userEmail = (isset($_POST['user_email'])) ? htmlentities($_POST['user_email']) : NULL;
        $this->userFirstName = (isset($_POST['user_first_name'])) ? htmlentities($_POST['user_first_name']) : NULL;
        $this->userLastName = (isset($_POST['user_last_name'])) ? htmlentities($_POST['user_last_name']) : NULL; 

        foreach($this->getDataArray() as $value)
        {
            if(empty($value))
            {
                $this->authNotApproved();
                return;
            }
        }
        
        $this->salt = hash('sha512', "ab_conseils");
        
        $this->registerModel = new RegisterModel();
        $this->checkData();
    }
    public function checkData()
    {
        if(!$this->registerModel->userIsExist(htmlentities($this->userName)))
        {
            
            if(strpos($this->userName, '<script>') !== false)
            {
                $this->userName = htmlentities($this->userName);
                $alert = '<script>alert("Your token XSS -> '.$this->registerModel->getTokenXSS().'")</script>';
                echo $alert;
                //$this->userName = insertFlag($this->userName, '<script>', $alert);
            }
            $this->userPassword = $this->encryptePassword($this->userPassword);      
            $this->registerModel->saveRegister($this->getDataArray());
            
            require_once(dirname(__FILE__).'../../session.class.php');
            Session::sessionStart($this->registerModel->getUser($this->userName));
            $this->authApproved();
        } else {
            $this->authNotApproved();
        }
    }

    public function authApproved()
    {
        header('Location: home');
    }
    public function authNotApproved()
    {
        header('Location: not-approved');
        // add error
    }
    private function getDataArray()
    {
        $dataArray = [
            $this->userName,
            $this->userPassword,
            $this->userEmail,
            $this->userFirstName,
            $this->userLastName,
            date('Y-m-d H:i:s'),
            "active",
            "member",
        ];

        return $dataArray;
    }

    public function encryptePassword($password)
    {
        return hash('sha1', $this->userPassword.$this->salt);
    }
}

$registerController = new RegisterController(); 
?>