<?php 

require_once(dirname(__FILE__).'../../database/management.model.class.php');

class RegisterModel
{
    private $table;
    
    public function __construct()
    {
        $this->table = 'users';
    }
    
    public function saveRegister($data)
    {
        Management::insertInto($this->table, $this->getColumnArray(), $data);
    }
    
    public function getUser($user)
    {
        $user = Management::selectFrom($this->table, 'user_login', 'user_login', $user);
        return $user[0]['user_login'];
    }
    
    public function getTokenXSS()
    {
        $flag_key =  Management::selectFrom('flags', 'flag_key', 'flag_name', 'XSS');
        if(is_array($flag_key) && !empty($flag_key[0]['flag_key']))
        {
            return $flag_key[0]['flag_key'];
        }
        return '';
    }
    
    public function userIsExist($user)
    {
        if(!empty(Management::selectFrom($this->table, 'user_login', 'user_login', $user)))
        { 
            return true;
        } else {
            return false;
        }
    }

    public function getColumnArray()
    {
         return [
            "user_login", 
            "user_pass",
            "user_email", 
            "user_first_name", 
            "user_last_name", 
            "user_registered_UTC", 
            "user_status", 
            "user_role", 
        ];

    }
    
}
$registerModel = new RegisterModel();
?>