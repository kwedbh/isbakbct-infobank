<?php if (!isset($site)) {
  Main::redirect_to(Main::url_for("/Secured_Page/DAPP/ysbonline/staff/sites/"));
} ?>

  <div class="container-fluid">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="name">Site Name:</label>
        <input type="text" class="form-control" placeholder="Enter  Site Name" name="site[site_name]" value="<?php  echo Main::h($site->site_name); ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="name">Site phone:</label>
        <input type="text" class="form-control" placeholder="Enter Site phone" name="site[phone]" value="<?php  echo Main::h($site->phone); ?>">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="name">Bank Email Address:</label>
        <input type="text" class="form-control" placeholder="Enter Bank Email" name="site[email_address]" value="<?php  echo Main::h($site->email_address); ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="name">Bank Address:</label>
        <input type="text" class="form-control" placeholder="Bank Address" name="site[bank_address]" value="<?php  echo Main::h($site->bank_address); ?>">
      </div>      
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="name">Bank Currency:</label>
        <input type="text" class="form-control" placeholder="Enter Bank Email" name="site[site_currecncy]" value="<?php  echo Main::h($site->site_currecncy); ?>">
      </div>
</div>
    <br>
