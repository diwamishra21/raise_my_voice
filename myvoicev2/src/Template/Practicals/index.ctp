<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Practical[]|\Cake\Collection\CollectionInterface $practicals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Practical'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="practicals index large-9 medium-8 columns content">
    <h3><?= __('Practicals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($practicals as $practical): ?>
            <tr>
                <td><?= $this->Number->format($practical->id) ?></td>
                <td><?= h($practical->user_name) ?></td>
                <td><?= h($practical->email) ?></td>
                <td><?= h($practical->address) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $practical->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $practical->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $practical->id], ['confirm' => __('Are you sure you want to delete # {0}?', $practical->id)]) ?>
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
