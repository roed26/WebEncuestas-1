<div class="actions columns large-2 medium-3">
    <h3><?= __('Menú') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Usuarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Encuestas'), ['controller' => 'Polls', 'action' => 'index']) ?> </li>
    </ul>
</div>
<div class="polls form large-10 medium-9 columns">
    <?= $this->Form->create($poll); ?>
    <fieldset>
        <legend><?= __('Add Poll') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Siguiente')) ?>
    <?= $this->Form->end() ?>
</div>
