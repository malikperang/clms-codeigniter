<?php echo validation_errors(); ?>
<?php echo form_open('html_to_pdf/gen_pdf_by_time'); ?>
<div class="span12 widget-margin">
<table class="table table-bordered">
	<tr>
		<td rowspan="6"><img class="profile-image" src="<?php echo base_url();?>/image/<?php echo $image_name;?>"></td>
	</tr>
	<tr>
		<td>Nama</td><td><?php echo $name;?></td>
	</tr>
	<tr>
		<td>No. Kad Pengenalan</td><td><?php echo $ic_num;?></td>
	</tr>
	<tr>
		<td>Alamat :</td><td><?php echo $address;?></td>
	</tr>
	<tr>
		<td>No. Telefon</td><td><?php echo $phone_num;?></td>
	</tr>
	<tr>
		<td>Email</td><td><?php echo $email;?></td>
	</tr>
</table>
</div>
<div><button class="btn btn-inverse" type="submit" name="download"><i class="icon-download-alt icon-white"></i>Muat turun PDF</button>
</div>
</div>
</div>