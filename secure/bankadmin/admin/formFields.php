<?php if (!isset($admin)) {
  Main::redirect_to(Main::url_for("/bankadmin/admin/"));
} ?>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" id="first_name" placeholder="First Name" name="admin[first_name]" value="<?php  print Main::h($admin->first_name)?>">
  </div>
  <div class="form-group col-md-6">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="admin[last_name]" value="<?php print Main::h($admin->last_name)  ?>">
  </div>
</div>
<div class="form-row">
<div class="form-group col-md-12">
  <label for="email">Email</label>
  <input type="email" class="form-control" id="email" placeholder="Email Address" name="admin[email]" value="<?php print Main::h($admin->email) ?>">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="password">Password</label>
  <input type="password" class="form-control" id="password" name="admin[password]" value="" placeholder="Password">
</div>
<div class="form-group col-md-6">
  <label for="password">Confirm Password</label>
  <input type="password" class="form-control" id="confirm_password" name="admin[confirm_password]" value="" placeholder="confirm Password">

</div>
</div>
