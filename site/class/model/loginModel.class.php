<?php 

require_once(dirname(__FILE__).'../../database/management.model.class.php');

class LoginModel 
{
    private $table;
    
    public function __construct()
    {
        $this->table = 'users';
    }
    
    public function getUser_IJT_SQL($userLogin, $userPassword)
    {
        $column = '*';
        $where = "user_login='$userLogin' AND user_pass LIKE '$userPassword';";
        $userInfo = Management::selectFrom_IJT_SQL($this->table, $column, $where);
        if(is_array($userInfo) && !empty($userInfo))
        {
            return $userInfo[0];
        }
        return array();
    }
    
    public function getTokenIJT_SQL()
    {
        $flag_key =  Management::selectFrom('flags', 'flag_key', 'flag_name', 'IJT_SQL');
        if(is_array($flag_key) && !empty($flag_key[0]->flag_key))
        {
            return $flag_key[0]->flag_key;
        }
        return '';
    }
    
    public function getUser($userPassword)
    {
        $userInfo = Management::selectFrom($this->table, '*', 'user_pass', $userPassword);
        if(is_array($userInfo) && !empty($userInfo))
        {
            return $userInfo[0];
        }
        return array();
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


?>