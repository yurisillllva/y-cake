<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class LoginsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout', 'edit']);
    }

    public function login()
    {
        if($this->request->is('post')){
            $login = $this->Auth->identify();
            if($login){
                $this->Auth->setUser($login);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Usuário ou senha ínvalida, tente novamente'));
        }
    }
        
    public function logout(){
        return $this->redirect($this->Auth->logout());
    }

    public function index()
    {
        $this->set('logins', $this->Logins->find('all'));
    }

    public function view($login_id)
    {
        $login = $this->Logins->get($login_id);
        $this->set(compact('login'));
    }

    public function add()
    {
        $login = $this->Logins->newEntity();
        if($this->request->is('post')){
            $login = $this->Logins->patchEntity($login, $this->request->getData());
            if ($this->Logins->save($login)) {
                $this->Flash->success(__('O usuário foi salvo.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Não é possível adicionar o usuário.'));
        }
        $this->set('login', $login);
    }

    public function edit($login_id = null){
        $login = $this->Logins->get($login_id); 
        if($this->request->is(['post', 'put'])){
            $this->Logins->patchEntity($login, $this->request->getData());
            if($this->Logins->save($login)){
                $this->Flash->success(  'Seu login foi atualizado!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(  'Não foi possivel editar seu login');
        }
        $this->set('login', $login);
    }
    
}