<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practical $practical
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $practical->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $practical->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Practicals'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="practicals form large-9 medium-8 columns content">
    <?= $this->Form->create($practical) ?>
    <fieldset>
        <legend><?= __('Edit Practical') ?></legend>
        <?php
            echo $this->Form->control('user_name');
            echo $this->Form->control('email');
            echo $this->Form->control('address');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
