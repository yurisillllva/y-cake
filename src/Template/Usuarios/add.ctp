<h1>ADICIONAR USUARIO</h1>
<?php
    echo $this->Form->create($usuario);
    echo $this->Form->input('nome');
   
    echo $this->Form->input('parent_id', [
        'options' => $carros,
        'empty' => 'Sem Carros'
    ]);
    echo $this->Form->button(  ('Salvar usuario'));
    echo $this->Form->end();
?>