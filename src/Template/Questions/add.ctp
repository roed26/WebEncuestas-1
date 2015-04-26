<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Polls'), ['controller' => 'Polls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Poll'), ['controller' => 'Polls', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Answer'), ['controller' => 'Answer', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answer', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Answer Text'), ['controller' => 'AnswerText', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Answer Text'), ['controller' => 'AnswerText', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="questions form large-10 medium-9 columns">
    <?= $this->Form->create($question); ?>
    <fieldset>
        <legend><?= __('Add Question') ?></legend>
        <?php
            echo $this->Form->input('poll_id', ['options' => $polls]);
            echo $this->Form->input('title');
            echo $this->Form->input('qtype');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
