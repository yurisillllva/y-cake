<?php 
namespace App\Controller;
use App\Controller\AppController;

Class CarrosController extends AppController{
    public function initialize(){
        parent::initialize();
        $this->loadComponent('Flash');
    }
   
    public function index(){
        $carros = $this->Carros->find('all');
        $this->set(compact('carros'));
    }

    public function view($id = nuul){
        $carros = $this->Carros->get($id);
        $this->set(compact('carros'));
    }

    public function add(){
        $carro = $this->Carros->newEntity();
        if($this->request->is('post')){
            $carro = $this->Carros->patchEntity($carro, $this->request->getData());
            if($this->Carros->save($carro)){
                $this->Flash->success(  'Seu carro foi salvo!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(  'Não foi possivel add seu carro');
        }
        $this->set('carro', $carro);
        $usuarios = $this->Carros->Usuarios->find('treeList');
        $this->set(compact('usuarios')); 
    }

    public function edit($id = null){
        $carro = $this->Carros->get($id); 
        if($this->request->is(['post', 'put'])){
            $this->Carros->patchEntity($carro, $this->request->getData());
            if($this->Carros->save($carro)){
                $this->Flash->success(  'Seu carro foi atualizado!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(  'Não foi possivel editar seu carro');
        }
        $this->set('carro', $carro);
    }

    public function delete($id){
        $this->request->allowMethod(['post', 'delete']);
        $carro = $this->Carros->get($id);
        if($this->Carros->delete($carro)){
        $this->Flash->success(('Carro excluído com sucesso, id:'.$id));
            return $this->redirect(['action' => 'index']);
        }
    }


}