<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Witn $witn
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Witn'), ['action' => 'edit', $witn->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Witn'), ['action' => 'delete', $witn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $witn->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Witns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Witn'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="witns view large-9 medium-8 columns content">
    <h3><?= h($witn->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Wi Name') ?></th>
            <td><?= h($witn->wi_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wi Bu') ?></th>
            <td><?= h($witn->wi_bu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wi City') ?></th>
            <td><?= h($witn->wi_city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wi Location') ?></th>
            <td><?= h($witn->wi_location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wi Empid') ?></th>
            <td><?= h($witn->wi_empid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Id') ?></th>
            <td><?= h($witn->email_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relationship') ?></th>
            <td><?= h($witn->relationship) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($witn->id) ?></td>
        </tr>
    </table>
</div>
