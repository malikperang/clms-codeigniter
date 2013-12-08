     </div>
   </div>
      <div class="login" align="center">
<?php echo form_open('verifylogin/index');?>

      <h1>Admin Login</h1>
      <label for="username">Username:</label>
      <input type="text" size="20" id="username" name="username"/>
      <br/>
      <label for="password">Password:</label>
      <input type="password" size="20" id="password" name="password"/>
      <br/>
      <?php echo form_open('verifylogin/check_database'); ?>
      <input type="submit" value="Login"/>
      <?php echo validation_errors(); ?>
    </div>

<?php echo form_close();?>
