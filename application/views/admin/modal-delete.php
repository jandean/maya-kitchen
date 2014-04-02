<div id="delete-prompt" class="reveal-modal text-center small" data-reveal>
  <h3>Are you sure you want to delete this?</h2>
  <hr>
  <div id="infoMessageDelete"></div>
  <input type="hidden" id="hid_delete_id" />
  <button class="tiny radius" data-cont='<?php echo $controller; ?>' data-func='<?php echo $function; ?>' data-goto='<?php echo $goto; ?>' onclick="delete_entry(this)">Delete</button>
  <button class="tiny radius secondary cancel">Cancel</button>
  <a class="close-reveal-modal">&#215;</a>
</div>