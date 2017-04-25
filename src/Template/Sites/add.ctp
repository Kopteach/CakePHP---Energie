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
        <h2>Add a new site</h2>
        <hr class="colorgraph">
        <div class="form-group">
          <?= $this->Form->input('name', ['class' => 'form-control input-lg', 'placeholder' => 'Name', 'label' => false, 'required']) ?>
        </div>
        <div class="form-group">
          <?= $this->Form->input('type', [
            'options' => [
              '' => '',
              '1' => 'Producer',
              '0' => 'Consumer'
            ],
            'class' => 'form-control input-lg',
            'label' => false,
            'required']) ?>
          </div>
          <div class="form-group">
            <?= $this->Form->input('latitude', ['class' => 'form-control input-lg', 'placeholder' => 'Latitude', 'label' => false, 'required']) ?>
          </div>
          <div class="form-group">
            <?= $this->Form->input('longitude', ['class' => 'form-control input-lg', 'placeholder' => 'Longitude', 'label' => false, 'required']) ?>
          </div>
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <?= $this->Form->button('Add the new site', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
            </div>
          </div>
        </fieldset>
        <?= $this->Form->end() ?>
      </div>
    </div>

  </div>
