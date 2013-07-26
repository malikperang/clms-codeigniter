<?php ini_set('display_errors', 'on'); ?>
<div class="row-fluid">
<div class="span12 widget container-wrapper">
<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 <h1><?php echo $alert;?></h1></strong>
</div>

<?php foreach($result as $row): ?>
<table class="table table-bordered table-hover">
	<tr>
		<td>Nama</td><td><?php echo $row->name;?></td>
	</tr>
	<tr>
		<td>No Kad Pengenalan</td><td><?php echo $row->ic_num;?></td>
	</tr>
</table>
<?php endforeach ?>
<?php echo form_close();?>
</div>
</div>
</div>
</div>
















