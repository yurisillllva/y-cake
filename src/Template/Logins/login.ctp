<div class="logins form">
<?php echo $this->Flash->render('auth') ?>
<?php echo $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor informe seu usuário e senha') ?></legend>
        <?= $this->Form->input('loginome') ?>
        <?= $this->Form->input('senha') ?>
    </fieldset>
<?php echo $this->Form->button(__('Login')); ?>
<?php echo $this->Form->end() ?>
</div>