<h1>ADICIONAR CARRO</h1>
<?php
    echo $this->Form->create($carro);
    echo $this->Form->input('marca');
    echo $this->Form->input('modelo');
    echo $this->Form->input('placa');
    echo $this->Form->button(  ('Salvar carro'));
    echo $this->Form->end();
?>