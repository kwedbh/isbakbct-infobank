<?php require_once "../private/initialize.php"; 

$transfer = Transfer::find_by_account_number($logged_user->account_number);

require_once SHARED_PATH . "/logged_in_header.php"; ?>

    <div class="page-content">
        <div class="container " style="min-width:100%">

            <link href="../bankassets/css/style-62688.css id=layoutstyle" rel="stylesheet">

            <div class="page-content">
                <div class="container" style="min-width:100%">
                    <h1>Transfer History</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Transfer History</li>
                    </ol>
                    <div class="card content-area">
                        <div class="card-innr">
                            <div class="card-head">
                                <h4 class="card-title">Transfer History</h4>
                            </div>
                            <div class="table-responsive">

                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="table-wrap">
                                    <div class="table-responsive">
                                            <table id="ddatable_14" class="table table-bordered w-100">
<thead>
	<tr>
    <th>Type</th>
		<th>Name</th>
		<th>Date</th>
		<th>Amount</th>
    <th>Description</th>
		<th>&nbsp;</th>
	</tr>
</thead>
<tbody>

<?php foreach ($transfer as $transfers):?>   	
<tr>
<td>
<?php print Main::h($transfers->transaction_type) ?>
</td>
<td>
<h6 class="fs-16 font-w600 mb-0"><?php print $transfers->reciever_name ?></h6>
<span class="fs-14"><?php print Main::h($transfers->reciever_account_number) ?>
</span>
</td>
<td>
<h6 class="fs-16 text-black font-w600 mb-0"><?php print date("F j, Y",strtotime($transfers->transfer_date))  ?></h6>
<span class="fs-14"><?php print date("g:i a",strtotime($transfers->transfer_date))  ?></span>
</td>
<td><span class="fs-16 text-black font-w600">
<?php 

print $logged_user->currency  . " ".number_format($transfers->amount, 2);

?>    
</span></td>

<td><?php print Main::h($transfers->Transfer_description) ?></td>


<td><span class="text-success fs-16 font-w500 text-end d-block">
    

    <?php if ($transfers->transfer_status == "Failed") {?>

<span class="badge badge-danger">        
            <a class="text-white" href="<?php print Main::url_for("/transfer/otp.php?id=".$transfers->id) ?>">Confirm transfer</a></span>
           <?php }else{?>

<span class="badge badge-success my_red_background">            

             Success

           <?php } ?>
    


</span>

</span></td>
</tr>

<?php endforeach ?>
	
</tbody>
</table>                                                
                                            </div>                                       
                                        <div class='alert alert-danger text-center d-none' style='border-color:#222; color:#222;'><strong><h3 class='text-center'>You have not made any Transfer yet.</h3></strong></div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3 text-left text-md-right">
                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="../bankassets/js/jquery.bundle.js.download"></script>


        </div>
    </div>

    <script src="../bankassets/js/chart.js.download"></script>
    </div>
    <style>
        body {
            background-color: #140123;
        }
    </style>

<?php require_once SHARED_PATH . "/footer.php" ;