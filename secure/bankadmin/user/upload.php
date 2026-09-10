<?php


require '../../private/initialize.php';

Main::require_login_admin();


 if (!isset($_SESSION['maxfiles'])) {
 	$_SESSION['maxfiles'] = ini_get('max_file_uploads');
 	$_SESSION['postmax'] = UploadFile::convertToBytes(ini_get('post_max_size'));
 	$_SESSION['displaymax'] = UploadFile::convertFromBytes($_SESSION['postmax']);
 }
 $max = 2000 * 1024;
 $result = array();


 if (Main::is_post_request()) {

 	$destination = './../../images/';
    $args = $_POST['upload'];
     try {
     	$upload = new UploadFile($destination);
     	$upload->setMaxSize($max);
     	$upload->allowAllTypes();
     	$upload->upload();
     	$result = $upload->getMessages();
     } catch (Exception $e) {
     	$result[] = $e->getMessage();
     }
}

 $error = error_get_last();

?>

<?php require_once SHARED_PATH."/admin_header.php"; ?>
  <div class="container mt-5">
    <h6>Upload Client Image / Images</h6>
    <?php if ($result || $error) { ?>
    <ul class="result">
    <?php
    if ($error) {
        echo "<li class='list-group-item'>{$error['message']}</li>";
    }
    if ($result) {
    	foreach ($result as $message) {
    	    echo "<li class='list-group-item'>$message</li>";
    	}
    }?>
    </ul>
    <?php } ?>
    <form action="<?php echo Main::h($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
    <p class="mt-3 mb-3">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo Main::h($max);?>">
    <label for="file_name">Select File:</label>
    <input class="form-control mt-3" type="file" name="file_name[]" id="file_name" multiple
    data-maxfiles="<?php echo $_SESSION['maxfiles'];?>"
    data-postmax="<?php echo $_SESSION['postmax'];?>"
    data-displaymax="<?php echo $_SESSION['displaymax'];?>">
    </p>

    <ul class="list-group mb-1">
    <li class="list-group-item mb-4">Up to <?php echo $_SESSION['maxfiles'];?> files can be uploaded simultaneously.</li>
    <li class="list-group-item mb-4">Each file should not be more than <?php echo UploadFile::convertFromBytes($max);?>.</li>
    <li class="list-group-item mb-4">Combined total should not exceed <?php echo $_SESSION ['displaymax'];?>.</li>
  </ul>

  <p class="mb-3"><a href="<?php print Main::url_for("/bankadmin/user/new.php") ?>">Continue</a></p>

    <p>
    <input class="btn btn-info rounded-0" type="submit" name="upload[file_name]" value="Upload File">
    </p>
    </form>
    <script src="<?php print Main::url_for("/js/checkmultiple.js") ?>"></script>

  </div>
  </div>          
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
<?php require_once SHARED_PATH."/logged_in_footer.php"; ?>
