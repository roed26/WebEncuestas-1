<h1>
    Polls questioned with
    <?= $this->Text->toList($questions) ?>
</h1>

<section>
<?php foreach ($polls as $poll): ?>
    <article>
        <h4><?= $this->Html->link($poll->title, $poll->url) ?></h4>
        <small><?= h($poll->url) ?></small>
        <?= $this->Text->autoParagraph($poll->description) ?>
    </article>
<?php endforeach; ?>
</section>