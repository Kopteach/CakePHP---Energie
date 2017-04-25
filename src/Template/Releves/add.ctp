<?php
/**
* @var \App\View\AppView $this
*/
?>
<div class="container">

  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <?= $this->Form->create() ?>
      <fieldset>
        <h2>Add a new statement for <?= h($siteName) ?></h2>
        <hr class="colorgraph">
        <div class="form-group">
          <?= $this->Form->input('value', ['class' => 'form-control input-lg', 'placeholder' => 'Value', 'label' => false, 'required']) ?>
        </div>
        <div class="form-group">
          <?= $this->Form->input('date', ['type' => 'date', 'label' => false, 'dateFormat' => 'Y-m-d'])?>
        </div>
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <?= $this->Form->button('Add the new statement', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
          </div>
        </div>
      </fieldset>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
