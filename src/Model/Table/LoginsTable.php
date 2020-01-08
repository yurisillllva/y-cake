<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DigestAuthenticate;
use Cake\Event\Event;

class LoginsTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('loginome', 'Usuário é necessário')
            ->notEmpty('senha', 'Senha é necessária')
            ->notEmpty('role', 'Função é necessária')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author']],
                'message' => 'Por favor informe uma função válida'
            ]);
    }

    public function beforeSave (Event $event){
        $entity = $event->getData('entity');
        //$event->data['entity'];

        $entity->digest_hash = DigestAuthenticate::password(
            $entity->loginome,
            $entity->senha,
            env('SERVER_NAME')
        );
        return true;
    }
}
