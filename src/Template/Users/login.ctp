<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('login') ?>

<div class="container">

  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <?= $this->Flash->render('auth') ?>
      <?= $this->Form->create() ?>
      <fieldset>
        <h2>Login to intranet</h2>
        <hr class="colorgraph">
        <div class="form-group">
          <?= $this->Form->input('email', ['class' => 'form-control input-lg', 'placeholder' => 'Email Address', 'label' => false, 'required']) ?>
        </div>
        <div class="form-group">
          <?= $this->Form->input('password', ['class' => 'form-control input-lg', 'placeholder' => 'Password', 'label' => false, 'required']) ?>
        </div>
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <?= $this->Form->button('Log in', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
          </div>
        </div>
      </fieldset>
      <?= $this->Form->end() ?>
    </div>
  </div>

</div>
