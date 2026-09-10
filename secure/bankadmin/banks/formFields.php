<?php if (!isset($admin)) {
  Main::redirect_to(Main::url_for("/bankadmin/admin/"));
} ?>
<div class="form-row">
  <div class="form-group col-md-12">
    <label for="first_name">Bank Name</label>
    <input type="text" class="form-control" id="first_name" placeholder="Bank Name" name="admin[name]" value="<?php  print Main::h($admin->name)?>">
  </div>
</div>

