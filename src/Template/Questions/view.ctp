<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Polls'), ['controller' => 'Polls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Poll'), ['controller' => 'Polls', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Answer'), ['controller' => 'Answer', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answer', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Answer Text'), ['controller' => 'AnswerText', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Answer Text'), ['controller' => 'AnswerText', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="questions view large-10 medium-9 columns">
    <h2><?= h($question->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Poll') ?></h6>
            <p><?= $question->has('poll') ? $this->Html->link($question->poll->title, ['controller' => 'Polls', 'action' => 'view', $question->poll->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($question->title) ?></p>
            <h6 class="subheader"><?= __('Qtype') ?></h6>
            <p><?= h($question->qtype) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($question->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($question->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($question->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Answer') ?></h4>
    <?php if (!empty($question->answer)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Question Id') ?></th>
            <th><?= __('Content') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($question->answer as $answer): ?>
        <tr>
            <td><?= h($answer->id) ?></td>
            <td><?= h($answer->question_id) ?></td>
            <td><?= h($answer->content) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Answer', 'action' => 'view', $answer->]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Answer', 'action' => 'edit', $answer->]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Answer', 'action' => 'delete', $answer->], ['confirm' => __('Are you sure you want to delete # {0}?', $answer->)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related AnswerText') ?></h4>
    <?php if (!empty($question->answer_text)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Question Id') ?></th>
            <th><?= __('Content') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($question->answer_text as $answerText): ?>
        <tr>
            <td><?= h($answerText->id) ?></td>
            <td><?= h($answerText->question_id) ?></td>
            <td><?= h($answerText->content) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'AnswerText', 'action' => 'view', $answerText->]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'AnswerText', 'action' => 'edit', $answerText->]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AnswerText', 'action' => 'delete', $answerText->], ['confirm' => __('Are you sure you want to delete # {0}?', $answerText->)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
