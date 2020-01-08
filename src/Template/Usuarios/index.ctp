<div class="actions large-2 medium-3 columns">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Novo Usuario'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="usuarios index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Parent Id</th>
            <th>Nome</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($usuarios as $usuario):?>
        <tr>
            <td><?= $usuario->id ?></td>
            <td><?= $usuario->parent_id ?></td>
            <td><?= h($usuario->nome) ?></td>
            <td class = "actions">
                <?php echo $this->Html->link(__('View'), ['action' => 'view', $usuario->id]); ?>
                <?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $usuario->id]);?>
                <?php echo $this->Html->postLink(__('Delete'), ['action' => 'delete', $usuario->id], ['confirm' => __('Vc tem certeza que quer deletar # {0}?', $usuario->id)]);?>
                <?php echo $this->Html->postLink(__('Move down'), ['action' => 'moveDown', $usuario->id], ['confirm' => __('Vc tem certeza que quer mover p/baixo # {0}?', $usuario->id)]); ?>
                <?php echo $this->Hmml->postLink(__('Move Up'), ['action' => 'moveUp', $usuario->id], ['confirm' => __('Vc tem certeza que quer mover p/cima # {0}?', $usuario->id)]);?>
                </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>

