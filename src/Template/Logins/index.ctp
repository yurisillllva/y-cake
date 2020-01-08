<h1>LOGIN</h1>
<?= $this->Html->link('LOGIN', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Login</th>
        <th>Nome</th>
        <th>Senha</th>
        <
    </tr>

    <?php foreach ($logins as $login): ?>
    <tr>
        <td><?= $login->loginome ?></td>
        <td><?= $login->senha ?></td>
        <td><?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $login->login_id]);?></td>
        <td><?= /*$this->Form->postLink(
            'Deletar', ['action' => 'delete', $login->id],
            ['confirm' => 'Tem certeza?']
        )*/?>

    </tr>
    <?php endforeach; ?>
</table>