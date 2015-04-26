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
        <legend><?= __('Edit Poll') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('pstate', [
                'options' => ['En Construccion' => 'En Construccion', 'Abierta al Publico' => 'Abierta al Publico', 'Cerrada al Publico' => 'Cerrada al Publico']
                ]);
        ?>

        <?= $this->Form->postLink(
                __('Eliminar encuesta'),
                ['action' => 'delete', $poll->id],
                ['confirm' => __('¿Esta seguro que desea eliminar esta encuesta?')]
            )
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
