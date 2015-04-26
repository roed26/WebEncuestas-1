<div class="actions columns large-2 medium-3">
    <h3><?= __('Menú') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Usuarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Encuestas'), ['controller' => 'Polls', 'action' => 'index']) ?> </li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Agregar usuario') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('role');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>
