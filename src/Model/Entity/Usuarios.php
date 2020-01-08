<?php

namespace App\Model\Entity;
use Cake\ORM\Entity;

Class Usuarios extends Entity{
    protected $_accessible = [
        'id' => true,
        'nome' => true,
        'parent_id' => true,
        ];
   }
