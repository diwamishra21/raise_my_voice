<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practical $practical
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Practical'), ['action' => 'edit', $practical->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Practical'), ['action' => 'delete', $practical->id], ['confirm' => __('Are you sure you want to delete # {0}?', $practical->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Practicals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Practical'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="practicals view large-9 medium-8 columns content">
    <h3><?= h($practical->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User Name') ?></th>
            <td><?= h($practical->user_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($practical->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($practical->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($practical->id) ?></td>
        </tr>
    </table>
</div>
