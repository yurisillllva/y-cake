<h1>Editar Usuario</h1>
<?php
    echo $this->Form->create($usuario);
    echo $this->Form->input('nome');
    
    echo $this->Form->input('parent_id', [
        'options' => $usuario,
        'empty' => 'No parent usuario'
    ]);
    echo $this->Form->button(__('Salvar usuario'));
    echo $this->Form->end();
?>