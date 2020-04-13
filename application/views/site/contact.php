<div class="container">
  <div class="row">
    <h3><?=$title; ?></h3>
    <!-- <?php /*echo validation_errors();*/ ?> -->
  </div>
  <div class="row">
    <?= form_open('contact', ['class' => 'form-horizontal']); ?>
    <div class="form-group">
      <?= form_label("Votre nom&nbsp;:", "name", ['class' => "col-md-5 control-label "]) ?>
        <div class="col-md-10 <?= empty( form_error('name')) ?'':'has-error' ?>">
      <?= form_input(['name' => "name", 'id' => "name", 'class' => 'form-control']) ?>
        <div><?php echo form_error('name'); ?></div>
      </div>
    </div>
    <div class="form-group">
      <?= form_label("Votre e-mail&nbsp;:", "email", ['class' => "col-md-5 control-label "]) ?>
      <div class="col-md-10"> 
        <?= form_input(['name' => "email", 'id' => "email", 'type' => 'email', 'class' => 'form-control'],set_value('email')) ?>
         <div><?php echo form_error('email'); ?></div>
      </div>
    </div>
    <div class="form-group">
      <?= form_label("Confirmez votre e-mail&nbsp;:", "email2", ['class' => "col-md-5 control-label "]) ?>
      <div class="col-md-10"> 
        <?= form_input(['name' => "email2", 'id' => "email2", 'type' => 'email', 'class' => 'form-control'],set_value('email2')) ?>
         <div><?php echo form_error('email2'); ?></div>
      </div>
    </div>
    <div class="form-group">
      <?= form_label("Titre&nbsp;:", "title", ['class' => "col-md-5 control-label "]) ?>
      <div class="col-md-10">
        <?= form_input(['name' => "title", 'id' => "title", 'class' => 'form-control']) ?>
         <div><?php echo form_error('title'); ?></div>
      </div>
    </div>
    <div class="form-group">
      <?= form_label("Votre message&nbsp;:", "message", ['class' => "col-md-5 control-label "]) ?>
      <div class="col-md-10">
        <?= form_textarea(['name' => "message", 'id' => "message", 'class' => 'form-control']) ?>
         <div><?php echo form_error('message'); ?></div>
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
