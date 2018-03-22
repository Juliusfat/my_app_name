<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dataelement $dataelement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dataelement'), ['action' => 'edit', $dataelement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dataelement'), ['action' => 'delete', $dataelement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dataelement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dataelement'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dataelement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Data'), ['controller' => 'Data', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Data'), ['controller' => 'Data', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dataelement view large-9 medium-8 columns content">
    <h3><?= h($dataelement->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= $dataelement->has('data') ? $this->Html->link($dataelement->data->name, ['controller' => 'Data', 'action' => 'view', $dataelement->data->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($dataelement->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dataelement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($dataelement->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($dataelement->modified) ?></td>
        </tr>
    </table>
</div>
