<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Controller\Controller;

Class UsuariosController extends AppController{
    public function index(){
        $usuarios = $this->Usuarios->find()->order(['id' => 'ASC']);
        $this->set(compact('usuarios'));
        $this->set('_serialize', ['usuarios']);
    }

    public function view($id = nuul){
        $usuarios = $this->Usuarios->get($id);
        $this->set(compact('usuarios'));
    }

    public function add(){
        Controller::loadModel('Carros');
        $usuario = $this->Usuarios->newEntity();
        $carros = $this->Carros->find()->order(['id' => 'ASC']);
        //$carrros_pronto = [];
        foreach($carros as $carro){
            //echo $carro->placa.' -> ';
            $carrros_pronto[$carro->id] = $carro->placa;
            
        }
        //debug($carrros_pronto);
        $carros = $carrros_pronto;
        $this->set('carros', $carros);
        if($this->request->is('post')){
            //debug($this->request->getData());
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            debug ($usuario);
            if($this->Usuarios->save($usuario)){
                $this->Flash->success(  'Seu usuario foi salvo!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(  'Não foi possivel add seu usuario');
        }
        $this->set('usuario', $usuario);
    }

    public function edit($id = null){
        $usuario = $this->Usuarios->get($id); 
        if($this->request->is(['post', 'put'])){
            $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if($this->Usuarios->save($usuario)){
                $this->Flash->success(  'Seu usuario foi atualizado!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(  'Não foi possivel editar seu carro');
        }
        $this->set('usuario', $usuario);
    }

    public function delete($id){
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if($this->Usuarios->delete($usuario)){
        $this->Flash->success(('Usuario excluído com sucesso, id:'.$id));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function moveUp($id = null){
        $this->request->allowMethod(['post', 'put']);
        $usuario = $this->Usuarios->get($id);
        if($this->Usuarios->moveUp($usuario)){
            $this->Flash->success('O usuario foi movido p/cima!');
        }
        else{
            $this->Flash->error('O usuario ñ foi movido p/cima. Tente novamente! ');
        }
        return $this->redirect($this->referer(['action' => 'index']));
    }

    public function moveDown($id = null){
        $this->request->allowMethod(['post', 'put']);
        $usuario = $this->Usuarios->get($id);
        if($this->Usuarios->moveDown($usuario)){
            $this->Flash->success('O usuario foi movido para baixo');
        } else {
            $this->Flash->error('O usuario não foi movido p/baixo. Tente novamente!');
        }
        return $this->redirect($this->referer(['action' => 'index']));
    }
}