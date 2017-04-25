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
        <h2>Edit the site <?= h($site->name) ?></h2>
        <hr class="colorgraph">
        <div class="form-group">
          <?= $this->Form->input('name', ['class' => 'form-control input-lg', 'value' => $site->name, 'label' => false, 'required']) ?>
        </div>
        <div class="form-group">
          <?php if($site->type) : ?>
            <?= $this->Form->input('type',
            [
              'options' => [
                '1'=> 'Producer',
                '0' => 'Consumer'
              ],
              'class' => 'form-control input-lg',
              'label' => false,
              'required']) ?>
            </div>
          <?php else : ?>
            <?= $this->Form->input('type',
            [
              'options' => [
                '0'=> 'Consumer',
                '1' => 'Producer'
              ],
              'class' => 'form-control input-lg',
              'label' => false,
              'required']) ?>
              <div class="form-group">
              </div>
            <?php endif; ?>
            <div class="form-group">
              <?= $this->Form->input('latitude', ['class' => 'form-control input-lg', 'value' => $site->latitude, 'label' => false, 'required']) ?>
            </div>
            <div class="form-group">
              <?= $this->Form->input('longitude', ['class' => 'form-control input-lg','value' => $site->longitude, 'label' => false, 'required']) ?>
            </div>
            <hr class="colorgraph">
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <?= $this->Form->button('Edit', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
              </div>
            </div>
          </fieldset>
          <?= $this->Form->end() ?>
        </div>
      </div>

    </div>
