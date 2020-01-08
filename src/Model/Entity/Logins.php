<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

Class Logins extends Entity{
    protected $_accessible = [
        'login_id' => false,
        'loginome' => true,
        'senha' => true,
        'role' => true
        ];
   
    
    protected function _setPassWord($senha)
    {
        if(strlen($senha > 0)){
            return (new DefaultPasswordHasher)->hash($senha);
        }
    } 
   
   
}
