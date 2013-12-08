<?php ini_set('display_errors', 'On');?>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('data_form/edit_form');?>
<div class="row-fluid">
<div class="span12 container-wrapper">
<div class="row-fluid">
<div class="span6 widget">
    <h3>Profil Pelanggan</h3>
<hr>
      <?php 
  $result = $this->session->flashdata('update_result');
  if($result):?>
  <div class="alert alert-error"><h4>Success!</h4><button type="button" class="close" data-dismiss="alert">&times;</button><?php echo $result;?></div>
  <?php endif;?>
<table class="">
  <?php foreach($get_data as $row):?>
  <tr>
    <input type="hidden" name="id" value="<?php echo $row->customer_id;?>"/>
    <td>Nama</td>
    <td>  
<div class="input-prepend">
  <span class="add-on"><i class="icon-user"></i></span>
  <input class="span12" id="prependedInput" type="text" name="name" value="<?php echo $row->name;?>">
</div>
    </td>
  </tr>
  <tr>
    <td>No.I/C</td>
    <td>
    <div class="input-prepend">
    <span class="add-on"><i class="icon-user"></i></span>
    <input class="span12" id="prependedInput" type="text" name="ic_num" value="<?php echo $row->ic_num;?>">
    </div>
    </td>
  </tr>  
  <tr>  
  <td>Alamat</td>
  <td>
    <div class="input-prepend">
    <span class="add-on"><i class="icon-user"></i></span>
    <input class="span12" id="prependedInput" type="text" name="address" value="<?php echo $row->address;?>">
    </div>
  </td>
  </tr>
  <tr>  
  <td>No.Telefon</td>
  <td>
    <div class="input-prepend">
    <span class="add-on"><i class="icon-user"></i></span>
    <input class="span12" id="prependedInput" name="phone_num" type="text" value="<?php echo $row->phone_num;?>">
    </div>
  </td>
  </tr>
  <tr>  
  <td>Email</td>
  <td>
    <div class="input-prepend">
    <span class="add-on"><i class="icon-user"></i></span>
    <input class="span12" id="prependedInput" type="text" name="email" value="<?php echo $row->email;?>">
    </div>
  </td>
  </tr>
</table>
<?php //echo $upload_error;?>
<table>
  <tr>
    <td>
          <button class="btn btn-primary" type="submit" name="submit"><i class="icon-hdd icon-white"></i>Simpan</button>&nbsp;
           </td>
            <?php echo form_close();?>
            <td>
           <?php echo form_open('html_to_pdf/gen_pdf_by_id'); ?>
           <br />
           <input type="hidden" name="id" value="<?php echo $row->customer_id;?>"/>
            <button class="btn btn-inverse" type="submit" name="download"><i class="icon-download-alt icon-white"></i>Muat turun PDF</button>
          <?php echo form_close();?>
        </td>
      </tr>
</table>
</div>

<div class="span6 widget">
  <div class="span12 image-widget">
    <img class="profile-image" src="<?php echo base_url();?>/image/<?php echo $row->ic_image;?>">
    <br />
     <input type="file" name="userfile" size="20"/>
</div>
<?php endforeach;?>
</div>
</div>
</div>
</div>
</div>
</div>




