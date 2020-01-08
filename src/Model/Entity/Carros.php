<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Carros extends Entity{
    // Code from bake.
    protected $_accessible = [
        'id' => true,
        'marca' => true,
        'modelo' => true,
        'placa' => true
    ];
   
}