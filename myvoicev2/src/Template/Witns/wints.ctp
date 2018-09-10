<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Witn[]|\Cake\Collection\CollectionInterface $witns
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Witn'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="witns index large-9 medium-8 columns content">
    <h3><?= __('Witns') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wi_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wi_bu') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wi_city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wi_location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wi_empid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('relationship') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($witns as $witn): ?>
            <tr>
                <td><?= $this->Number->format($witn->id) ?></td>
                <td><?= h($witn->wi_name) ?></td>
                <td><?= h($witn->wi_bu) ?></td>
                <td><?= h($witn->wi_city) ?></td>
                <td><?= h($witn->wi_location) ?></td>
                <td><?= h($witn->wi_empid) ?></td>
                <td><?= h($witn->email_id) ?></td>
                <td><?= h($witn->relationship) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $witn->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $witn->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $witn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $witn->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
