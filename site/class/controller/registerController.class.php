<?php 

require_once(dirname(__FILE__).'../../function/AES256.function.php');

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
        
        $this->salt = "";
    }
    public function checkData()
    {
        
    }
    public function authApproved()
    {
        header('Location: approved');
    }
    public function authNotApproved()
    {
        header('Location: not-approved');
        // add error
    }
    
    public function encryptePassword($password)
    {
        //$Salt = $this->registerModel->getSalt();
        return hash('sha1', $this->userPassword.$this->Salt);
    }
}

$registerController = new RegisterController(); 
?>