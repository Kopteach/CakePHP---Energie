<?php
/**
* @var \App\View\AppView $this
*/
?>
<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h2><?= h($site->name) ?></h2>
      <?= $this->Html->link('Add a new statement', [
        'controller'=>'Releves',
        'action' => 'add',
        $site->id,$site->name
      ], [
        'class' => 'btn btn-sm btn-info'
        ]) ?>
        <?= $this->Html->link('Add a new transport route', [
          'controller'=>'Transports',
          'action' => 'add',
          $site->id,$site->name
        ],
        [
          'class' => 'btn btn-sm btn-info'
        ]
        )?>
        <?= $this->Html->link('Edit', ['action' => 'edit', $site->id], ['class' => 'btn btn-sm btn-info']) ?>
      </div>
      <table class="table table-bordered">
        <tr>
          <th scope="row"><?= __('Name') ?></th>
          <td><?= h($site->name) ?></td>
        </tr>
        <tr>
          <th scope="row"><?= __('Type') ?></th>
          <?php if($site->type) : ?>
            <td>Producer</td>
          <?php else : ?>
            <td>Consumer</td>
          <?php endif ; ?>
        </tr>
        <tr>
          <th scope="row"><?= __('Latitude') ?></th>
          <td><?= $this->Number->format($site->latitude) ?></td>
        </tr>
        <tr>
          <th scope="row"><?= __('Longitude') ?></th>
          <td><?= $this->Number->format($site->longitude) ?></td>
        </tr>
      </table>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th><?= $this->Paginator->sort('value') ?></th>
          <th><?= $this->Paginator->sort('date') ?></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($site->releves as $releves): ?>
          <tr>
            <td><?= h($releves->value) ?></td>
            <td><?= h($releves->date) ?></td>
            <td>
              <?= $this->Form->postLink('', ['controller' => 'Releves' ,'action' => 'delete', $releves->id],
              ['confirm' => __('Are you sure you want to delete {0}?', $releves->id), 'class' => 'glyphicon glyphicon-remove']) ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
