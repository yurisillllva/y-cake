<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

Class UsuariosTable extends Table{
    public function initialize(array $config){
        //$this->addBehavior('Tree');
    }

    public function validationDefault(Validator $validator){
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->notEmpty('nome');

         $validator
            ->add('parent_id', 'valid', ['rule' => 'numeric'])
            
            ->notEmpty('parent_id');

            return $validator;
    }
} 