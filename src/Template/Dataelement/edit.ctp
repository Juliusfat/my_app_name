<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dataelement $dataelement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dataelement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dataelement->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dataelement'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Data'), ['controller' => 'Data', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Data'), ['controller' => 'Data', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dataelement form large-9 medium-8 columns content">
    <?= $this->Form->create($dataelement) ?>
    <fieldset>
        <legend><?= __('Edit Dataelement') ?></legend>
        <?php
            echo $this->Form->control('data_id', ['options' => $data]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
