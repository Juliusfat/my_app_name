

<strong><?php echo $this->Flash->render('message');?></strong>

<div class="row">
<h2>Voici la liste des données</h2>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php if(!empty($data)):?>
    <?php foreach($data as $data):?>
    <tr class="table-active">
      <td><?php echo $data->id?></td>
      <td><?php echo $data->name?></td>
      <td>
        <?php echo $this->Html->link('Edit', ['action'=>'view', $data->id],['class'=>'btn btn-primary']);?>
        <?php echo $this->Html->link('Update', ['action'=>'edit', $data->id],['class'=>'btn btn-success']);?>
        <?php echo $this->Html->link('Supp', ['action'=>'delete', $data->id],['class'=>'btn btn-danger'],['confirm' => 'Etes vous sur?']);?>
        <?php echo $this->Html->link('Json', ['action'=>'json', $data->id],['class'=>'btn btn-warning']);?>

      </td>
    </tr>
    <?php endforeach;?>
    <?php else:?>
    <td>pas de donnees</td>
    <?php endif?>
  </tbody>
</table>
</div>
<?php echo $this->Html->link('ajouter données', ['action'=>'add'],['class'=>'btn btn-primary']);?>