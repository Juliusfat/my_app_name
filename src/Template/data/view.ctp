
<div class="row">
<h2><?php echo "Voici le détail de la data ".$elements->id?></h2>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Description</th>
      <th scope="col">Date de creation</th>
      <th scope="col">Date de modification</th>

    </tr>
  </thead>
  <tbody>
    <tr class="table-active">
      <td><?php echo $elements->id?></td>
      <td><?php echo $elements->name?></td>
      <td><?php echo $elements->created->format('d-m-Y')?></td>
      <td><?php echo $elements->modified->format('d-m-Y')?></td>
    </tr>
   </tbody>
</table>
</div>
<h3><?php echo "Voici les éléments de la data ".$elements->id?></h3>

<div>

    <ul class="list-group">
    <?php foreach ($elements->data_element as $el): ?>
    <li>
        <?php echo "Titre de l'élément : ".$el->name?>
    </li>
    <?php endforeach; ?>
    </ul>
</div>
<div><?php echo $this->Html->link('Retour', ['action'=>'index'],['class'=>'btn btn-primary']);?></div>
