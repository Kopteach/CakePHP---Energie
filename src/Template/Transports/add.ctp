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
        <h2>Add a new transport route to <?= h($siteName) ?></h2>
        <hr class="colorgraph">
        <div class="form-group">
          <?= $this->Form->input('name', ['class' => 'form-control input-lg', 'placeholder' => 'Name', 'label' => false, 'required']) ?>
        </div>
        <!-- If producer -->
        <?php if($siteType) : ?>
          <div class="form-group">
            <?= $this->Form->input('consumer_site_id', [
              'type' => 'select',
              'options' => $othersites,
              'class' => 'form-control input-lg'
              ,'label' => false,
              'required'
              ]) ?>
            </div>
            <!-- else consumer -->
          <?php else : ?>
            <div class="form-group">
              <?= $this->Form->input('producer_site_id', [
                'options' => $othersites,
                'class' => 'form-control input-lg',
                'label' => false,
                'required'
                ]) ?>
              </div>
            <?php endif ; ?>
            <div class="form-group">
              <?= $this->Form->input('debit_max', ['class' => 'form-control input-lg', 'placeholder' => 'Debit max', 'label' => false, 'required']) ?>
            </div>
            <hr class="colorgraph">
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <?= $this->Form->button('Add the transport', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
              </div>
            </div>
          </fieldset>
          <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
