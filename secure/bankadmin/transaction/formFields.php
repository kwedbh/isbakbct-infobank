  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="reciever_bank_name">Receiver's Bank Name</label>
      <input type="text" class="form-control" id="reciever_bank_name" name="transfer[reciever_bank_name]" value="<?php print Main::h($transfer->reciever_bank_name) ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="reciever_name">Receiver's Name</label>
      <input type="text" class="form-control" id="reciever_name" name="transfer[reciever_name]" value="<?php print Main::h($transfer->reciever_name) ?>">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="reciever_account_number">Receiver's Account Number</label>
    <input type="text" class="form-control" id="reciever_account_number" name="transfer[reciever_account_number]" value="<?php print Main::h($transfer->reciever_account_number) ?>">
  </div>
  <div class="form-group col-md-6">
    <label for="route_number">SWIFT/ABA Routing Number</label>
    <input type="text" class="form-control" id="route_number" name="transfer[routing_number]" value="<?php print Main::h($transfer->routing_number) ?>">
  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="sender_account_number">Sender's Account Number</label>
      <input type="text" class="form-control" id="sender_account_number" value="<?php print Main::h($transfer->sender_account_number) ?>" name="transfer[sender_account_number]">
    </div>
    <div class="form-group col-md-6">
  <label class="sr-oly" for="amount">Amount</label>
  <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><?php print Main::h($logged_user->currency  . " ") ?></div>
    </div>
    <input type="text" class="form-control" id="amount" name="transfer[amount]" value="<?php print Main::h($transfer->amount) ?>">
  </div>
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="transfer_date">Transfer Date</label>
      <input type="text" class="form-control" id="transfer_date" value="<?php print date("d F Y") ?>" name="transfer[transfer_date]">
    </div>
  <div class="form-group col-md-6">
    <label for="transfer_status">Transfer Status</label>
    <select name="transfer[transfer_status]" id="transfer_status" class="form-control" <?php  echo Main::h($transfer->transfer_status); ?>>
  <option selected disabled>Choose...</option>
  <?php foreach(Transfer::TRANSFER_STATUS as $transfer_status) { ?>
  <option value="<?php echo $transfer_status; ?>" <?php if($transfer->transfer_status == $transfer_status) { echo 'selected'; } ?>><?php echo $transfer_status; ?></option>
  <?php } ?>
    </select>
  </div>
  </div>
    <div class="form-row d-none">
    <div class="form-group col-md-6">
  <label class="sr-oly" for="credit">Credit</label>
  <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><?php print Main::h($logged_user->currency  . " ") ?></div>
    </div>
    <input type="text" class="form-control" id="credit" name="transfer[credit]" value="<?php print Main::h($transfer->credit)?>">
  </div>
    </div>
    <div class="form-group col-md-6">
  <label class="sr-oly" for="debit">Debit</label>
  <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><?php print Main::h($logged_user->currency  . " ") ?></div>
    </div>
    <input type="text" class="form-control" id="debit" name="transfer[debit]" value="<?php print Main::h($transfer->debit)?>">
  </div>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="reciever_email">Reciever's email address</label>
      <input type="email" class="form-control" id="reciever_email" value="<?php print Main::h(MASTER_EMAIL) ?>" name="transfer[reciver_email]" >
    </div>
  <div class="form-group col-md-6">
    <label for="transfer_type">Transfer Type</label>
    <select name="transfer[transfer_type]" id="transfer_type" class="form-control" <?php  echo Main::h($transfer->transfer_type); ?>>
  <option selected disabled>Choose...</option>
  <?php foreach(Transfer::TRANSFER_TYPE as $transfer_type) { ?>
  <option value="<?php echo $transfer_type; ?>" <?php if($transfer->transfer_type == $transfer_type) { echo 'selected'; } ?>><?php echo $transfer_type; ?></option>
  <?php } ?>
    </select>
  </div>    
</div>    
<div class="form-group">
    <label for="Transfer_description">Transfer Description</label>
    <textarea name="transfer[Transfer_description]" class="form-control" id="Transfer_description" rows="8" style="resize: none;"><?php print Main::h($transfer->Transfer_description) ?></textarea>
  </div>