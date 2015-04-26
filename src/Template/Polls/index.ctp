<div class="actions columns large-2 medium-3">
    <h3><?= __('Menú') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Usuarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Encuestas'), ['controller' => 'Polls', 'action' => 'index']) ?> </li>
    </ul>
    </ul>
</div>
<div class="polls index large-10 medium-9 columns">
    <br/>
    <br/>
    <?= $this->Html->link(__('Agregar Encuesta'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Titulo') ?></th>
            <th><?= $this->Paginator->sort('Estado') ?></th>
            <th><?= $this->Paginator->sort('Creado') ?></th>
            <th class="actions"><?= __('Acciones') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($polls as $poll): ?>
        <tr>
            <td><?= h($poll->title) ?></td>
            <td><?= h($poll->pstate) ?></td>
            <td><?= h($poll->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Ver'), ['action' => 'view', $poll->id]) ?>
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $poll->id]) ?>
                <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $poll->id], ['confirm' => __('¿Esta seguro que desea eliminar esta encuesta?')]) ?>
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
