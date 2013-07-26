<?php ini_set('display_errors', 'On');?>
<?php echo form_open_multipart('data_form/general_form');?>
<div class="row-fluid">
<div class="span6 widget">
    <h3>Profil Pelanggan</h3>
<hr>
<div class="form-horizontal general-form">
    <fieldset>
        <?php foreach($get_data as $row):?>
      <div class="control-group">
         <label class="control-label">Nama</label>
         <div class="controls">
          <div class="input-prepend">
         <span class="add-on"><i class="icon-user"></i></span>
            <input class="span2" id="prependedInput" size="150" type="text" name="name" value="<?php echo $row->name;?>">
        </div>
         </div>
      </div>
       <div class="control-group">
         <label class="control-label">No.Kad Pengenalan</label>

         <div class="controls">
          <div class="input-prepend">
         <span class="add-on"><i class="icon-th-list"></i></span>
            <input class="span2" id="prependedInput" size="150" type="text" name="ic_num">
        </div>
                 <p style="color:red;"><?php echo form_error('ic_num'); ?></p>
         </div>
      </div>
        <div class="control-group">
         <label class="control-label">Alamat</label>
         <div class="controls">
          <div class="input-prepend">
            <textarea class="span12" id="prependedInput" type="text" name="address"></textarea>
        </div>
         </div>
      </div>
        <div class="control-group">
         <label class="control-label">No.Telefon</label>
         <div class="controls">
          <div class="input-prepend">
         <span class="add-on"><i class="icon-envelope"></i></span>
            <input class="span2" id="prependedInput" size="150" type="text" name="phone_num">
        </div>
         </div>
      </div>
       <div class="control-group">
         <label class="control-label">Email</label>
         <div class="controls">
          <div class="input-prepend">
         <span class="add-on"><i class="icon-envelope"></i></span>
            <input class="span2" id="prependedInput" size="150" type="text" name="email">
        </div>
         </div>
      </div>
            <div class="control-group">
         <label class="control-label">Lampiran</label>
         <div class="controls">
          <div class="input-prepend">
            <input type="file" name="userfile" size="20"/>
        </div>
         </div>
      </div>
<?php echo $upload_error;?>
          <div class="control-group">
         <div class="controls">
            <button class="btn btn-primary" type="submit" name="submit"><i class="icon-search icon-white"></i>Hantar</button>
         </div>
      </div>
</div>

<?php echo form_close();?>
<br />
</div>
<div class="span6 widget">
    <div class="span12 widget-title">
        <h4 align="center">SEARCH</h4>
    </div>
    <p>Masukkan nombor kad pengenalan pelanggan.</p>
<?php echo form_open('data_form/search_form');?>
<div class="input-append">
  <input class="span2" id="appendedInputButtons" name="num_ic" type="text" size="280">
  <button class="btn btn-primary" type="submit" name="search"><i class="icon-search icon-white"></i>Cari</button>

<?php echo form_close();?>
</div>




