<div class="actions columns large-2 medium-3">
    <h3><?= __('Menú') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Usuarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Encuestas'), ['controller' => 'Polls', 'action' => 'index']) ?> </li>
    </ul>
</div>
        
<div class="users index large-10 medium-9 columns">
    <br/>
    <br/>
    <?= $this->Html->link(__('Agregar Usuario'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">    
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('usuario') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('rol') ?></th>
            <th><?= $this->Paginator->sort('nombre') ?></th>
            <th><?= $this->Paginator->sort('apellido') ?></th>
            <th class="actions"><?= __('Acciones') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->role) ?></td>
            <td><?= h($user->first_name) ?></td>
            <td><?= h($user->last_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id]) ?>
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?>
                <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $user->id], ['confirm' => __('¿Esta seguro que desea eliminar el usuario <{0}>?', $user->username)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?><br/>
            <?= $this->Paginator->counter() ?>
        </ul>
    </div>
</div>
