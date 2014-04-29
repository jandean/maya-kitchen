<section class="main row">
  <?php echo $sidemenu; ?>
  <div class="core small-10 columns">
    <h3><?php echo lang('deactivate_heading');?></h3>
    <p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?>?</p>
    <hr>

    <?php echo form_open("auth/deactivate/".$user->id);?>

      <p>
        <input type="radio" name="confirm" value="yes" checked="checked" /> <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
        <input type="radio" name="confirm" value="no" /> <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
      </p>

      <?php echo form_hidden($csrf); ?>
      <?php echo form_hidden(array('id'=>$user->id)); ?>
      <button type="submit" class="button tiny radius alert">SAVE</button>
      <a href="<?php echo base_url('users'); ?>" class="button tiny radius secondary">CANCEL</a>

    <?php echo form_close();?>
  </div>
</section>