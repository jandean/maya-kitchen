<section class="main row">
  <?php echo $sidemenu; ?>
  <div class="core small-10 columns">
    <h3><?php echo $title; ?></h3>
    <hr>
    <div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open(uri_string());?>
      <label>
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </label>
      <label>
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </label>
      <!-- <label>
            <?php echo lang('edit_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </label> -->
      <!-- <label>
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </label> -->
      <label>
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </label>
      <label>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
      </label>

      <!-- <?php if ($this->ion_auth->is_admin()): ?>

          <h3></?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo $group['name'];?>
              </label>
          <?php endforeach?>

      <?php endif ?> -->

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <button type="submit" class="button tiny radius alert">SAVE</button>
      <a href="<?php echo base_url('users'); ?>" class="button tiny radius secondary">CANCEL</a>

    <?php echo form_close();?>
  </div>
</section>