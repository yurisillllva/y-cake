<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;


Class CarrosTable extends Table{
    public function initialize(array $config){
        $this->addBehavior('Timestamp');
        $this->belongsTo('Usuarios', 
        [ 'foreingkey' => 'id',]);
    }
    public function validationDefault(Validator $validator){
        $validator
        ->notEmpty('marca')
        ->notEmpty('modelo')
        ->notEmpty('placa');

        return $validator;
    }
}