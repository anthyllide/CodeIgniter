<div class="container">
  <div class="row">
    <h3><?= $title ?></h3>
    <hr/>
  </div>
  <div class="row">
    <?= form_open('connexion', ['class' => 'form-horizontal']); ?>
      <?php if(!empty ($login_error)) : ?>
      <div class="form-group">
        <div class="alert alert-danger">
          <?= $login_error; ?>
      </div>
      </div>
     <?php endif; ?>
    <div class="form-group">
      <?= form_label("Nom d'utilisateur&nbsp;:", "username", ['class' => "col-md-10 control-label"]) ?>
      <div class="col-md-10">
        <?= form_input(['name' => "username", 'id' => "username", 'class' => 'form-control'], set_value('username')) ?>
        <div><?php echo form_error('username'); ?></div>
      </div>
    </div>
    <div class="form-group">
      <?= form_label("Mot de passe&nbsp;:", "password", ['class' => "col-md-10 control-label"]) ?>
      <div class="col-md-10">
        <?= form_password(['name' => "password", 'id' => "password", 'class' => 'form-control'], set_value('password')) ?>
        <div><?php echo form_error('password'); ?></div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
        <?= form_submit("send", "Envoyer", ['class' => "btn btn-primary"]); ?>
      </div>
    </div>
    <?= form_close() ?>
  </div>
</div>
