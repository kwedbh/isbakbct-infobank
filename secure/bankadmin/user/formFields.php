<?php if (!isset($user)) {
  Main::redirect_to(Main::url_for("/bankadmin/user/"));
} ?>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="first_name">Full Name</label>
    <input type="text" class="form-control" id="full_name" placeholder="Full Name" name="user[full_name]" value="<?php  print Main::h($user->full_name)?>">
  </div>
  <div class="form-group col-md-6">
    <label for="last_name">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Email" name="user[email]" value="<?php print Main::h($user->email)  ?>">
  </div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="text">Phone</label>
  <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="user[phone]" value="<?php print Main::h($user->phone) ?>">
</div>
<div class="form-group col-md-6">
  <label for="zipcode">Zip Code</label>
  <input type="text" class="form-control" id="zipcode" name="user[zipcode]" placeholder="Zip Code" value="<?php print Main::h($user->zipcode)  ?>">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="city">City</label>
  <input type="text" class="form-control" id="city" placeholder="City" name="user[city]" value="<?php print Main::h($user->city) ?>">
</div>
<div class="form-group col-md-6">
  <label for="country">Country</label>
  <input type="text" class="form-control" id="country" name="user[country]" placeholder="Country" value="<?php print Main::h($user->country)  ?>">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="account_pin">Account Pin</label>
  <input type="password" class="form-control" id="account_pin" name="user[account_pin]" value="<?php print Main::h($user->account_pin) ?>" placeholder="Account Pin">
</div>
<div class="form-group col-md-6">
  <label for="sort_code">Sort Code</label>
  <input type="text" class="form-control" id="sort_code" name="user[sort_code]" value="<?php print Main::h($user->sort_code) ?>" placeholder="Sort Code">

</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="route_number">Route Number</label>
  <input type="text" class="form-control" id="route_number" name="user[route_number]" value="<?php print Main::h($user->route_number) ?>" placeholder="Route Number">
</div>
<div class="form-group col-md-6">
  <label for="account_balance">Account Balance</label>
  <input type="text" class="form-control" id="account_balance" name="user[account_balance]" value="<?php print Main::h($user->account_balance) ?>" placeholder="Account Balance">

</div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="account_type">Account Status</label>
    <select name="user[account_status]" id="account_type" class="form-control" <?php  echo Main::h($user->account_status); ?>>
  <option selected disabled>Choose...</option>
  <?php foreach(User::ACCOUNT_STATUS as $account_status) { ?>
  <option value="<?php echo $account_status; ?>" <?php if($user->account_status == $account_status) { echo 'selected'; } ?>><?php echo $account_status; ?></option>
  <?php } ?>
    </select>
  </div>
  <div class="form-group col-md-6">
    <label for="account_type">Account Type</label>
    <select name="user[account_type]" id="account_type" class="form-control" <?php  echo Main::h($user->account_type); ?>>
  <option selected disabled>Choose...</option>
  <?php foreach(User::ACCOUNT_TYPE as $account_type) { ?>
  <option value="<?php echo $account_type; ?>" <?php if($user->account_type == $account_type) { echo 'selected'; } ?>><?php echo $account_type; ?></option>
  <?php } ?>
    </select>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6 col-12">
    <label for="account_active_status">OTP Status</label>
    <select name="user[account_active_status]" id="account_active_status" class="form-control" <?php  echo Main::h($user->account_active_status); ?>>
  <option selected disabled>Choose...</option>
  <?php foreach(User::ACCOUNT_ACTIVE_STATUS as $account_active_status) { ?>
  <option value="<?php echo $account_active_status; ?>" <?php if($user->account_active_status == $account_active_status) { echo 'selected'; } ?>><?php echo $account_active_status; ?></option>
  <?php } ?>
    </select>
  </div>

  <div class="form-group col-md-6 col-12">
  <label for="account_balance">User Currency</label>
  <select name="user[currency]" id="" class="form-control">

<?php 

foreach ($currencies as $key => $value): ?>
  <option <?php if ($user->currency == $key) {
    print 'selected';
  } ?> value="<?php print $key ?>"><?php print $key ?></option>
<?php endforeach; ?>        
</select>

</div>
</div>

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="cover_photo">Image Name:</label>
      <input id="cover_photo" type="text" class="form-control" placeholder="Please upload a cover photo" id="cover_photo" name="user[image_link]" value="<?php  echo Main::h($user->image_link); ?>">
    </div>
  </div>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#show_uploads_cover_photo" aria-expanded="false" aria-controls="collapse">Add Cover Photo</button>
<br>
<div aria-expanded="Show and hide images"  id="show_uploads_cover_photo" class="collapse comments text-justify" style="word-spacing: 1px;">
  <div class="table-responsive ">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php
  $all_uploads = UploadFile::find_all_uploads();
   while ($result = mysqli_fetch_assoc($all_uploads)):?>
   <tr>
     <td><img class="" src="<?php print Main::url_for("/images/".Main::h($result['file_name']) )?>" width="80" height="80"></td>
     <td><button  class="cover_photo_post btn btn-primary" type="button" value="<?php print Main::h($result['file_name']) ?>">Add</button></td>
   </tr>
<?php endwhile ?>
      </tbody>
    </table>
  </div>
</div>
<br>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="password">Password</label>
  <input type="Password" class="form-control" id="password" name="user[password]" value="" placeholder="Account Password">
</div>
<div class="form-group col-md-6">
  <label for="confirm_password">Confirm Password</label>
  <input type="password" class="form-control" id="confirm_password" name="user[confirm_password]" value="" placeholder="Confirm Account Password">

</div>
</div>

<div class="form-row">

<div class="form-group col-md-6">
  <label for="confirm_password">Transfer Fee</label>
  <input type="text" class="form-control" id="fee_amount" name="user[fee_amount]" value="<?php print Main::h($user->fee_amount) ?>" placeholder="">

</div>

  <div class="form-group col-md-6 mb-3">
    <label for="transfer_status">Transfer Status</label>
    <select required name="user[transfer_status]" id="transfer_status" class="form-control" <?php  echo Main::h($user->transfer_status); ?>>
  <?php foreach(User::TRANSFER_STATUS as $transfer_status) { ?>
  <option value="<?php echo $transfer_status; ?>" <?php if($user->transfer_status == $transfer_status) { echo 'selected'; } ?>><?php echo $transfer_status; ?></option>
  <?php } ?>
    </select>
  </div>

  <div class="col-12 mb-3">
    <textarea name="user[transfer_status_message]" rows="3" cols="3" class="form-control" style="resize: none;"><?php print Main::h((string)$user->transfer_status_message) ?></textarea>
  </div>


</div>