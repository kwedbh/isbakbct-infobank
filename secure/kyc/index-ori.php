<?php require_once "../private/initialize.php"; 

require_once SHARED_PATH . "/logged_in_header.php";

$user = User::find_by_id($logged_user->id);

if ($user->kyc_verified == 1) {

  print "<script>
  
  alert('Account Verified already.');
  window.location.replace('../dashboard/');

  </script>";  

  die();
}
elseif ($user->kyc_verified_sent == 1) {

  print "<script>
  
  alert('Please wait while we process your request.');
  window.location.replace('../dashboard/');

  </script>";  

  die();
}

  if (Main::is_post_request()) {

    // die();

      $args = $_POST;


      // $args['sent'] = 1;

    if (empty($_FILES['drivers_licence']['name']) &&
      empty($_FILES['int_pass']['name']) &&
      empty($_FILES['drivers_licence_back']['name']) &&
      empty($_FILES['national_id']['name']) && 
      empty($_FILES['national_id_back']['name']) ) {
      


       $session->message('Please Upload your Documents.');

      //  Kwed::redirect_to(Kwed::url_for("/kyc/"));
    }else {

        // =============  File Upload Code d  ===========================================

        $target_dir = "../images". "/";

        $target_file = $target_dir.basename($_FILES["drivers_licence"]["name"]);
        
        $target_file_1 = $target_dir.basename($_FILES["drivers_licence_back"]["name"]);

        $target_file2 = $target_dir.basename($_FILES["int_pass"]["name"]);

        $target_file3 = $target_dir.basename($_FILES["national_id"]["name"]);

        $target_file4 = $target_dir.basename($_FILES["national_id_back"]["name"]);

        $uploadOk = 1;

        
if (empty($_FILES['drivers_licence']['name']) ) {
          
          $ext = "";
          
        } else{
          
          $ext = pathinfo($target_file,PATHINFO_EXTENSION);
    }         
        
if (empty($_FILES['drivers_licence_back']['name']) ) {
          
          $ext_1 = "";
          
        } else{
          
          $ext_1 = pathinfo($target_file_1,PATHINFO_EXTENSION);
}   


if (empty($_FILES['int_pass']['name']) ) {

              $ext2 = "";

    } else{

      $ext2 = pathinfo($target_file2,PATHINFO_EXTENSION) ?? "n/a";
    }   
    
if (empty($_FILES['national_id']['name']) ) {
          
          $ext3 = "";
          
        } else{
          
          $ext3 = pathinfo($target_file3,PATHINFO_EXTENSION);
    }         
        
if (empty($_FILES['drivers_licence_back']['name']) ) {
          
          $ext4 = "";
          
        } else{
          
          $ext4 = pathinfo($target_file4,PATHINFO_EXTENSION);
}     




        $newFileName = $username.Kwed::random_number().".$ext";

        $newFileName_1 = $username.Kwed::random_number().".$ext_1";

        $newFileName2 = $username.Kwed::random_number().".$ext2";

        $newFileName3 = $username.Kwed::random_number().".$ext3";

        $newFileName4 = $username.Kwed::random_number().".$ext4";

        // die("Hello KWED");

         // Check file size -- Kept for 7Mb

        if ($_FILES["drivers_licence"]["size"] > 300000  || 
        $_FILES["drivers_licence_back"]["size"] > 300000 || 
        $_FILES["national_id"]["size"] > 300000  || 
        $_FILES["national_id_back"]["size"] > 300000 || 
        $_FILES["int_pass"]["size"] > 300000)  {

            $session->message("Sorry, your files are too large maximum of 3mb.");

            // Kwed::redirect_to(Kwed::url_for("/kyc/"));

            $uploadOk = 0;

        }



        // Allow certain file formats

        if($ext != "jpg" && $ext != "jpeg" && $ext != "png" && 
        $ext2 != "jpg" && $ext2 != "jpeg" && $ext2 != "png" &&

        $ext_1 != "jpg" && $ext_1 != "jpeg" && $ext_1 != "png" &&

        $ext3 != "jpg" && $ext3 != "jpeg" && $ext3 != "png" &&

        $ext4 != "jpg" && $ext4 != "jpeg" && $ext4 != "png"  
        
        ) {


          // die($ext2);

            $session->message("Sorry, only png, jpeg & jpg files are allowed.");

            // Kwed::redirect_to(Kwed::url_for("/kyc/"));

            $uploadOk = 0;

        }


        // print die($uploadOk);


        // Check if $uploadOk is set to 0 by an error

        if ($uploadOk == 0) {

            $session->message("Sorry, your file was not uploaded.");

            // Kwed::redirect_to(Kwed::url_for("/kyc/"));

        // if everything is ok, try to upload file

        } else {

            if ((move_uploaded_file($_FILES["drivers_licence"]["tmp_name"], $target_dir.$newFileName) && move_uploaded_file($_FILES["drivers_licence_back"]["tmp_name"], $target_dir.$newFileName_1) ) )  {

              
            
          $args['drivers_licence'] = $newFileName;     

           $args['drivers_licence_back'] = $newFileName_1;     


}


if ((move_uploaded_file($_FILES["int_pass"]["tmp_name"], $target_dir.$newFileName2) ) ) {

  $args['int_pass'] = $newFileName2;    
}

if ((move_uploaded_file($_FILES["national_id"]["tmp_name"], $target_dir.$newFileName3)  && move_uploaded_file($_FILES["national_id_back"]["tmp_name"], $target_dir.$newFileName4))) {
  
  $args['national_id']  = $newFileName3;

  $args['national_id_back']  = $newFileName4;
}



$args['kyc_verified_sent'] = 1;


$user->merge_attributes($args);

$result = $user->save();

if ($result) {

  print "<script>
  
  alert('Your ID has been received, we will get back to you shortly.');
  window.location.replace('../dashboard/');

  </script>";

  die();

}


}



}



}
?>

?>

<div class="page-content">
    <div class="container " style="min-width:100%">


        <link href="./images/jquery.growl.css" rel="stylesheet">
        <link href="./images/select2.min.css" rel="stylesheet">

        <link href="./images/spectrum.css" rel="stylesheet">
        <link href="./images/dropify.min.css" rel="stylesheet">

        <div class="container" style="min-width:100%">
            <div class="page-header">
                <h4 class="page-title">Verify Account</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Verify Account</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-12">
                    <form action="" class="card" method="post" enctype="multipart/form-data">
                        <div class="card-header">
                            <h3 class="card-title">Verify Account</h3>
                        </div>
                        <div class=" card-body">
                            <div class="alert alert-avatar alert-danger alert-dismissible">
                                <span class="avatar" style="background-image: url(https://elitehorizonbn.com/)"></span> Your Account Has Not Been Verified Yet on BANKABILLION. Please Upload A Means Of Identification To Get Verified On BANKABILLION and
                                become a bonafide member of the platform
                            </div>

                            <div class="kyc-form-steps card mx-lg-0">
                                <div class="form-step form-step1">
                                    <div class="form-step form-step2">
                                        <div class="form-step-head card-innr">
                                            <div class="step-head">
                                                <div class="step-number">01</div>
                                                <div class="step-head-text">
                                                    <h4>Document Upload</h4>
                                                    <p>To verify your identity, please upload any of your identification documents</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-step-fields card-innr">
                                            <div class="note note-plane note-light-alt note-md pdb-0-5x">
                                                <em class="fa-solid fa-info-circle"></em>
                                                <p>In order to complete, please upload any of the following personal document.
                                                </p>
                                            </div>
                                            <div class="gaps-2x"></div>
                                            <ul class="nav nav-tabs nav-tabs-bordered row flex-wrap guttar-20px" role="tablist">
                                                <li class="nav-item flex-grow-0">
                                                    <a class="nav-link d-flex align-items-center active" data-toggle="tab" href="#passport">
                                                        <div class="nav-tabs-icon">
                                                            <img src="../images/icon-passport-color.png" alt="icon">
                                                            <img src="../images/icon-passport-color.png" alt="icon">
                                                        </div>
                                                        <span>Passport</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item flex-grow-0">
                                                    <a class="nav-link d-flex align-items-center" data-toggle="tab" href="#national-card">
                                                        <div class="nav-tabs-icon">
                                                            <img src="../images/icon-national-id-color.png" alt="icon">
                                                            <img src="../images/icon-national-id-color.png" alt="icon">
                                                        </div>
                                                        <span>National ID Card</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item flex-grow-0">
                                                    <a class="nav-link d-flex align-items-center" data-toggle="tab" href="#driver-licence">
                                                        <div class="nav-tabs-icon">
                                                            <img src="../images/icon-licence-color.png" alt="icon">
                                                            <img src="../images/icon-licence-color.png" alt="icon">
                                                        </div>
                                                        <span>Driver’s License</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12">
                                                    <label class="input-item-label">File Upload</label>
                                                    <div class="relative">
                                                        <em class="input-file-icon fas fa-upload"></em>
                                                        <input name="image" type="file" class="input-file" id="file-01" required="">
                                                        <label for="file-01">Choose a file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="step-number">02</div>
                                                <div class="custom-file">
                                                    <label class="form-label">Select Upload Type</label>
                                                    <select name="id_type" class="input-bordered" required="">
                                                    <option value="Voters Card">Voters' Card</option>
                                                    <option value="Identity Card">Identity Card</option>
                                                    <option value="International Passport">International Passort
                                                    </option>
                                                    <option value="Drivers Licence">Drivers' License</option>
                                                </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="wd-200 mg-b-30">
                                                <div class="step-number">03</div>
                                                <label class="form-label">Enter ID Number</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    </div>
                                                    <input class="input-bordered" name="id_number" placeholder="ID Number" type="text" required="">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="wd-200 mg-b-30">
                                                <div class="step-number">04</div>
                                                <label class="form-label">Enter Expiry Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    </div>
                                                    <input class="input-bordered date-picker" id="date-of-birth" name="id_exp" placeholder="MM/DD/YYYY" required="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <br>
                                                <a href="index.php">
                                                    <button type="submit" class="btn btn-secondary">Cancel</button>
                                                    <button type="submit" name="verify" class="btn btn-primary pull-right">
                                                    Verify My Account
                                                </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="./images/jquery.timepicker.js.download"></script>
        <script src="./images/toggles.min.js.download"></script>

        <script type="text/javascript">
            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop your file here or click to upload',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                },
                error: {
                    'fileSize': 'The file size is too big (2M max).'
                }
            });
        </script>

        <script src="./images/jquery.bundle.js.download"></script>



    </div>
</div>

<script src="./images/chart.js.download"></script>

<p id="error" style="display: none "></p>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var error = document.getElementById('error');

    if (error.textContent == "empty") {
        swal("EMPTY FIELD!", "All fields are required", "warning");

    } else if (error.textContent == "success") {
        swal("Completed!", "Document Uploaded Successfully, Please wait while your document is been verified", "success");
        setTimeout(() => {
            window.location.href = 'profile.php'
        }, 3000);
    } else if (error.textContent == "error") {
        swal("ERROR!", "Sorry!!!, Something went wrong, try later or contact support", "error");
    }
</script>
<style>
    body {
        background-color: #140123;
    }
</style>

<script src="./images/chart.js" type="text/javascript"></script>

<?php require_once SHARED_PATH . "/footer.php" ?>   