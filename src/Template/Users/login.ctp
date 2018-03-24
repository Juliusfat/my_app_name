 <?php echo $this->Form->create();?>
  <fieldset>

    <legend>écran de connexion</legend>
    <div class="form-group row">

      <div class="col-sm-10">
        <?php echo $this->Form->control('email',['class'=>'form-control','Placeholder'=>'mail']);?>
        <?php echo $this->Form->control('password',['class'=>'form-control','Placeholder'=>'password']);?>
      </div>
    </div>


     <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
          <?php echo $this->Form -> button(__('Valider'),['class'=>'btn btn-primary']);?>
          <?php echo $this->html ->link('Retour',['action'=>'index'],['class'=>'btn btn-primary']);?>
      </div>
    </div>

  </fieldset>
  <?php echo $this->Form->end();?>