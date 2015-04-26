<div class="actions columns large-2 medium-3">
    <h3><?= __('Menú') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Usuarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Encuestas'), ['controller' => 'Polls', 'action' => 'index']) ?> </li>
    </ul>
</div>
<div class="polls view large-10 medium-9 columns">
    <h2><?= h($poll->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Usuario') ?></h6>
            <p><?= $poll->has('user') ? $this->Html->link($poll->user->first_name, ['controller' => 'Users', 'action' => 'view', $poll->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Titulo') ?></h6>
            <p><?= h($poll->title) ?></p>
            <h6 class="subheader"><?= __('Estado') ?></h6>
            <p><?= h($poll->pstate) ?></p>
        </div>

        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Acciones') ?></h6>
            <?= $this->Html->link(__('Editar encuesta'), ['action' => 'edit', $poll->id]) ?>
            <?= $this->Form->postLink(__('Borrar encuesta'), ['action' => 'delete', $poll->id], ['confirm' => __('¿Esta seguro que desea eliminar esta encuesta?')]) ?>
        </div>

        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Creado') ?></h6>
            <p><?= h($poll->created) ?></p>
            <h6 class="subheader"><?= __('Modificado') ?></h6>
            <p><?= h($poll->modified) ?></p>
        </div>

    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Descripción') ?></h6>
            <?= $this->Text->autoParagraph(h($poll->description)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('URL') ?></h6>
            <?= $this->Text->autoParagraph(h($poll->url)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
        <br/>
    <h4 class="subheader"><?= __('Preguntas de la Encuesta') ?></h4>
    <?= $this->Html->link(__('New Question'), ['controller' => 'Questions','action' => 'add']) ?>
    <?php if (!empty($poll->questions)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Pregunta') ?></th>
            <th><?= __('Tipo') ?></th>
            <th class="actions"><?= __('Acciones') ?></th>
        </tr>
        <?php foreach ($poll->questions as $questions): ?>
        <tr>
            <td><?= h($questions->title) ?></td>
            <td><?= h($questions->qtype) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('Ver'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>

                <?= $this->Form->postLink(__('Borrar'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('¿Esta seguro que desea eliminar esta pregunta?')]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
