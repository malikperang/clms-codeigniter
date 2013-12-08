<?php ini_set('display_errors', 'On');?>
<?php echo form_open_multipart('data_form/general_form');?>
<div class="row-fluid">
<div class="span6 widget">
	<div class="span12 widget-title">
        <h4 align="center">BORANG</h4>
	</div>
    <p>Sila isi borang ini dengan selengkapnya.</p>
<hr>
<?php 
  $error = $this->session->flashdata('error');
  if($error):?>
  <div class="alert alert-error"><h4>Amaran!</h4><button type="button" class="close" data-dismiss="alert">&times;</button><?php echo $error;?></div>
  <?php endif;?>
<?php echo $upload_error;?>
<table>
  <tr>
    <td style="width:100px;">Nama</td>
    <td style="width:300px;">  
<div class="input-prepend">
  <span class="add-on"><i class="icon-user"></i></span>
 <input class="span12" id="prependedInput"  type="text" name="name" >
</div>
<span class="help-block"><i>*e.g:Abu bin Ali</i></span>
  <?php echo form_error('name'); ?>
    </td>
  </tr>
  <tr>
    <td>No.I/C</td>
    <td>
    <div class="input-prepend">
    <span class="add-on"><i class="icon-user"></i></span>
    <input class="span12" id="prependedInput" type="text" name="ic_num">
 </div>
    <span class="help-block"><i>Nombor kad pengenalan yang sah.</i></span>
    <?php echo form_error('ic_num'); ?>
    </td>
  </tr>  
  <tr>  
  <td>Alamat</td>
  <td>
    <div class="input-prepend">
    <span class="add-on"><i class="icon-road"></i></span>
    <input class="span12" id="prependedInput" type="text" name="address">
    </div>
    <div class="input-prepend">
    <span class="add-on"><i class="icon-road"></i></span>
    <input class="span12" id="prependedInput" type="text" name="second_address">
    </div>
     <?php echo form_error('address'); ?>
  </td>
  </tr>
  <tr>  
  <td>No.Telefon</td>
  <td>
    <div class="input-prepend">
    <span class="add-on"><i class="icon-envelope"></i></span>
    <input class="span12" id="prependedInput" type="text" name="phone_num">
    </div>
     <?php echo form_error('phone_num'); ?>
  </td>
  </tr>

  <tr>  
  <td>Email</td>
  <td>
    <div class="input-prepend">
    <span class="add-on"><i class="icon-envelope"></i></span>
     <input class="span12" id="prependedInput" type="text" name="email">
    </div>
    <?php echo form_error('email'); ?>
  </td>
  </tr>
   <tr>  
  <td>Lampiran</td>
  <td>
     <input type="file" name="userfile" size="20"/>
  </td>
</tr>
<tr>
  <td>
  </td>
  <td>
    <span class="help-block"><i>Lampiran contoh:gambar I/C,passport atau <br />file image jpg/png/gif untuk pengesahan.</i></span>
  </td>

  </tr>
</table>
          <div class="control-group">
         <div class="controls">
            <button class="btn btn-primary" type="submit" name="submit"><i class="icon-hdd icon-white"></i> Simpan</button>
         </div>
      </div>
</div>
<?php echo form_close();?>
<div class="span6 widget">
    <div class="span12 widget-title">
        <h4 align="center">SEARCH</h4>
    </div>
    <p>Masukkan nombor kad pengenalan pelanggan.</p>
<?php echo form_open('data_form/search_form');?>
<div class="input-append">
  <input class="span12" id="appendedInputButtons" name="num_ic" type="text">
  <button class="btn btn-primary" type="submit" name="search"><i class="icon-search icon-white"></i>Cari</button>
<?php echo form_close();?>
</div>
<?php 
  $error = $this->session->flashdata('search-error');
  if($error):?>
  <div class="alert alert-error"><h4>Amaran!</h4><button type="button" class="close" data-dismiss="alert">&times;</button><?php echo $error;?></div>
  <?php endif;?>
</div>
</div>
</div>
</div>
