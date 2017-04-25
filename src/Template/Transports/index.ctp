<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h2>List of transport routes</h2>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('Producer') ?></th>
            <th><?= $this->Paginator->sort('Consumer') ?></th>
            <th><?= $this->Paginator->sort('Debit Max') ?></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($transports as $transport): ?>
            <tr>
              <td><?= h($transport->name) ?></td>
              <td><?= h($transport->producer_site_id) ?></td>
              <td><?= h($transport->consumer_site_id) ?></td>
              <td><?= $this->Number->format($transport->debit_max) ?></td>
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
