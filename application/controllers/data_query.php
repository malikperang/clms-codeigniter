<?php echo validation_errors(); ?>
<?php echo form_open('data_form/action_form'); ?>
<div class="span12 container-wrapper widget-table">
	<table class="table table-bordered table-hover query-table table-color widget-margin ">
	<tr>
		<th><center>Nama</center></th>
		<th><center>No. I/C</center></th>
		<th><center>Action</center></th>
	</tr>
	<tr>
		<?php if(isset($get_data) && is_array($get_data) && count($get_data > 0))
		{
			foreach($get_data as $row):?>
			<td><?php echo $row->name;?></td>
			<td><?php echo $row->ic_num;?></td>
			<td>
			<div class="btn-group">
  					<button class="btn" name="view" value="<?php echo $row->customer_id;?>" type="submit">View</button>
  					<button class="btn" name="delete" value="<?php echo $row->customer_id;?>" type="submit">Delete</button>
			</div>
			</td>
			</tr>
		<?php endforeach; }
	else 
	{?>
		<h1><?php echo "No Record Found!";?></h1>
	<?php }
?>
</table>
<?php echo form_close();?>
<p>Showing <?php echo $count_row_value;?> of <?php echo $count_row_value_all;?> results per page</p>
<?php echo $links;?>

</div>
</div>
</div>
</div>
