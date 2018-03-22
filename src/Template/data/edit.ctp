 <?php echo $this->Form->create($data);?>
  <fieldset>

    <legend>Modifiée une donnée</legend>
    <div class="form-group row">
    <?php echo $this->Form->hidden('id');?>

      <div class="col-sm-10">
        <?php echo $this->Form->input('name',['class'=>'form-control']);?>
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
          <?php echo $this->Form -> button(__('Modifier'),['class'=>'btn btn-primary']);?>
          <?php echo $this->html ->link('Retour',['action'=>'index'],['class'=>'btn btn-primary']);?>
      </div>
    </div>

  </fieldset>
  <?php echo $this->Form->end();?>