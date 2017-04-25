<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h2>List of sites</h2>
      <?= $this->Html->link('Add a site', ['action' => 'add'], ['class' => 'btn btn-sm btn-info']) ?>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('type') ?></th>
            <th><?= $this->Paginator->sort('latitude') ?></th>
            <th><?= $this->Paginator->sort('longitude') ?></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($sites as $site): ?>
            <tr>
              <td><?= h($site->name) ?></td>
                <?php if($site->type) : ?>
                  <td>Producer</td>
                <?php else : ?>
                  <td>Consumer</td>
                <?php endif ; ?>
              <td><?= h($site->latitude) ?></td>
              <td><?= h($site->longitude) ?></td>
              <td>
                <?= $this->Html->link('Details', ['action' => 'view', $site->id], ['class' => 'btn btn-sm btn-info']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $site->id],
                ['confirm' => __('Are you sure you want to delete {0}?', $site->name), 'class' => 'glyphicon glyphicon-remove']) ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="paginator">
      <ul class="pagination">
        <?= $this->Paginator->prev('< Previous') ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next('Next >') ?>
      </ul>
      <p><?= $this->Paginator->counter() ?></p>
    </div>
  </div>
</div>
