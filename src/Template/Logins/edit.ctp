<h1>Editar Login</h1>
<?php
    echo $this->Form->create($login);
    echo $this->Form->input('loginome');
    echo $this->Form->input('senha');
    echo $this->Form->input('role');
    echo $this->Form->button(__('Salvar login'));
    echo $this->Form->end();
?>