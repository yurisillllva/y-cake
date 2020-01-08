<h1>Lista de Carros</h1>
<?= $this->Html->link('ADICIONAR CARRO', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Id</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Placa</th>
    </tr>

    <?php foreach ($carros as $carro): ?>
    <tr>
        <td><?= $carro->id ?></td>
        <td><?= $carro->marca ?></td>
        <td><?= $carro->modelo ?></td>
        <td><?= $carro->placa ?></td>
        <td><?= $this->Form->postLink(
            'Deletar', ['action' => 'delete', $carro->id],
            ['confirm' => 'Tem certeza?']
        )?>
    <?= $this->Html->link('Editar', ['action' => 'edit', $carro->id]) ?></td>
        
    </tr>
    <?php endforeach; ?>
</table>