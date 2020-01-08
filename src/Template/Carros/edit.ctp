<h1>Editar Carro</h1>
<?php
    echo $this->Form->create($carro);
    echo $this->Form->input('marca');
    echo $this->Form->input('modelo');
    echo $this->Form->input('placa');
    echo $this->Form->button(__('Salvar carro'));
    echo $this->Form->end();
?>