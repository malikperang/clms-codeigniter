<?php echo validation_errors(); ?>
<?php echo form_open('data_form/action_form'); ?>
<div class="span12">
<table style="border:1px solid black;">
	<tr style="border:1px solid black;">
<td style="border:1px solid black;">No.</td>
<td style="border:1px solid black">Nama</td>
</tr>
<tr>

<td style="border:1px solid black;">
<?php
for($i=0; $i < $count_row_value_all;$i++){
	echo $i; };
	?>
</td>
<?php foreach($get_data as $row):?>
<td style="border:1px solid black;"><?php echo $row->name;?></td>
<?php endforeach;?> 
</tr>
</table>
<?php echo form_close();?>
<p>Showing <?php echo $count_row_value;?> of <?php echo $count_row_value_all;?> results per page</p>
<?php echo $links;?>
</div>
</div>
</div>
</div>