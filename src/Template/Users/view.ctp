<div class="actions columns large-2 medium-3">
    <h3><?= __('Menú') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Usuarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Encuestas'), ['controller' => 'Polls', 'action' => 'index']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->first_name.' '.$user->last_name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Usuario') ?></h6>
            <p><?= h($user->username) ?></p>
            <h6 class="subheader"><?= __('Correo') ?></h6>
            <p><?= h($user->email) ?></p>
            <h6 class="subheader"><?= __('Contraseña') ?></h6>
            <p>••••••••••</p>
            <h6 class="subheader"><?= __('Rol') ?></h6>
            <p><?= h($user->role) ?></p>
            <h6 class="subheader"><?= __('Nombre') ?></h6>
            <p><?= h($user->first_name) ?></p>
            <h6 class="subheader"><?= __('Apellido') ?></h6>
            <p><?= h($user->last_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Acciones') ?></h6>
            <?= $this->Html->link(__('Editar Usuario'), ['action' => 'edit', $user->id]) ?>
            <?= $this->Form->postLink(__('Borrar Usuario'), ['action' => 'delete', $user->id], ['confirm' => __('¿Esta seguro que desea eliminar el usuario <{0}>?', $user->username)]) ?>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($user->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($user->modified) ?></p>
        </div>
    </div>
</div>

<div class="related row">
    <div class="column large-12">
    <br/>
    <h4 class="subheader"><?= __('Encuestas de '.$user->first_name.' '.$user->last_name) ?></h4>
    <?php if (!empty($user->polls)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Titulo') ?></th>
            <th><?= __('Descripción') ?></th>
            <th><?= __('URL') ?></th>
            <th><?= __('Estado') ?></th>
            <th><?= __('Created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->polls as $polls): ?>
        <tr>
            <td><?= h($polls->title) ?></td>
            <td><?= h($polls->description) ?></td>
            <td><?= h($polls->url) ?></td>
            <td><?= h($polls->pstate) ?></td>
            <td><?= h($polls->created) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('Ver'), ['controller' => 'Polls', 'action' => 'view', $polls->id]) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'Polls', 'action' => 'edit', $polls->id]) ?>

                <?= $this->Form->postLink(__('Borrar'), ['controller' => 'Polls', 'action' => 'delete', $polls->id], ['confirm' => __('¿Esta seguro que desea eliminar esta encuesta?')]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
