<section class="row">
  <div class="small-6 large-centered columns">
    <h3 class="text-center"><?php echo lang('login_heading');?></h3>
    <div id="infoMessage"><?php echo $message;?></div>
    <?php echo form_open("auth/login");?>
      <div class="row">
        <label><?php echo lang('login_identity_label', 'identity');?>
          <?php echo form_input($identity);?>
        </label>
      </div>
      <div class="row">
        <label><?php echo lang('login_password_label', 'password');?>
          <?php echo form_input($password);?>
        </label>
      </div>
      <div class="row">
        <label>
          <div style="float:left">
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?><?php echo lang('login_remember_label', 'remember');?>
          </div>
          <!-- <div style="float:right">
            <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
          </div> -->
        </label>
      </div>
      <button type="submit" class="small radius"><?php echo lang('login_submit_btn'); ?></button>
    <?php echo form_close();?>
  </div>
</section>