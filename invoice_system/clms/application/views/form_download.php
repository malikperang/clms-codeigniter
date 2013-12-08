<!DOCTYPE html>
<html lang="en">
	<head>
	<style type="text/css">
	table 
	{
		width: 700px;
		border:1px solid black;
	}
	table tr
	{

		height: 400px;
	}
	table tr,th,td
	{
		border:1px solid #ddd;
	}
	table tr td
	{
		height:100px;
	}
	table td:first-child
	{
		background-color: #ddd;
		text-align: center;
	}
	.profile-image
	{
		
		width: 150px;
  		height:150px;
	}

	</style>
	</head>
	<body>
<table id="container">
	<?php foreach($get_data as $row):?>
	<tr>
		<th colspan="3">PROFIL PELANGGAN</th>
	</tr>
	<tr>
		<td colspan="3"><img class="profile-image" src="<?php echo base_url();?>images/gallery<?php echo $row->image_name;?>" /></td>
	</tr>
	<tr>
		<td >Nama</td><td colspan="2"><?php echo $row->name;?></td>
	</tr>
	<tr>
		<td>No. Kad Pengenalan</td><td colspan="2"><?php echo $row->ic_num;?></td>
	</tr>
	<tr>
		<td>Alamat :</td><td colspan="2"><?php echo $row->address;?></td>
	</tr>
	<tr>
		<td>No. Telefon</td><td colspan="2"><?php echo $row->phone_num;?></td>
	</tr>
	<tr>
		<td>Email</td><td colspan="2"><?php echo $row->email;?></td>
	</tr>

</table>
 <?php endforeach ?>
</div>
</body>
</html>