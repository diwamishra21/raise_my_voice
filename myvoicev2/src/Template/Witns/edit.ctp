<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Witn $witn
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $witn->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $witn->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Witns'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="witns form large-9 medium-8 columns content">
    <?= $this->Form->create($witn) ?>
    <fieldset>
        <legend><?= __('Edit Witn') ?></legend>
        <?php
            echo $this->Form->control('wi_name');
            echo $this->Form->control('wi_bu');
            echo $this->Form->control('wi_city');
            echo $this->Form->control('wi_location');
            echo $this->Form->control('wi_empid');
            echo $this->Form->control('email_id');
            echo $this->Form->control('relationship');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
