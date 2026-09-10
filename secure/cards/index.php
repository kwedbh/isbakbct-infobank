<?php require_once "../private/initialize.php"; 

$user = User::find_by_account_number($logged_acct);

if (Main::is_post_request()) {
    $args = $_POST;
    $errors = []; // Initialize error array

    // print_r($_FILES);

    // Handle the image uploads
    $target_dir = "../images/";  // Directory to upload images

    // Image 1 (Card Front)
    $image1 = $_FILES["card_front"]["name"] ?? '';
    $target_file1 = $target_dir . basename($image1);
    $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));

    // Image 2 (Card Back)
    $image2 = $_FILES["card_back"]["name"] ?? '';
    $target_file2 = $target_dir . basename($image2);
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

    // Validate uploaded files
    if (empty($image1) || empty($image2)) {
        $errors[] = "Both card images must be uploaded.";
    } elseif ($_FILES["card_front"]["size"] > 3 * 1024 * 1024 || $_FILES["card_back"]["size"] > 3 * 1024 * 1024) {
        $errors[] = "Sorry, one of your images is too large. Maximum allowed size is 3MB.";
    } elseif (!in_array($imageFileType1, ['jpg', 'jpeg', 'png', 'gif']) ||
              !in_array($imageFileType2, ['jpg', 'jpeg', 'png', 'gif'])) {
        $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed for both images.";
    }

    // Proceed with the upload if no errors
    if (empty($errors)) {
        // Attempt to move uploaded files
        $upload1 = move_uploaded_file($_FILES["card_front"]["tmp_name"], $target_file1);
        $upload2 = move_uploaded_file($_FILES["card_back"]["tmp_name"], $target_file2);

        if ($upload1 && $upload2) {
            // Images successfully uploaded, save the file names in the user object
            $user->card_front = $image1;
            $user->card_back = $image2;

            // Merge other attributes and save to the database
            $user->merge_attributes($args);
            $result = $user->save();

            if ($result) {
                echo "<script>alert('ID uploaded successfully!');</script>";
                echo "<script>window.location.replace('index.php');</script>";
                exit; // Ensure script stops after redirect
            } else {
                $errors[] = "There was a problem saving your data to the database.";
            }
        } else {
            $errors[] = "Sorry, there was an error uploading your images.";
        }
    }

    // Display errors if any
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>alert('" . htmlspecialchars($error) . "');</script>";
        }
    }
}

require_once SHARED_PATH . "/logged_in_header.php"; ?>

        <div class="container " style="min-width:100%">

            <div class="page-content">
                <div class="container" style="min-width:100%">
                    <h1>Requested ATM Card</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href=""><img src="../images/a1.png"> My Cards</a>
                        </li>
                        <li>
                    </ol>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">My Cards</div>
                                </div>

                                <div class="card-body">

                                <div class="container">

<?php if ($logged_user->card_front != ''): ?>
                               
<div class="row">
      <!-- Column 1 -->
      <div class="col-6 d-flex justify-content-center">
        <div class="card-container">
          <img 
            src="<?php print Main::url_for("/images/".$logged_user->card_front) ?>" 
            alt="Credit Card" 
            class="credit-card-image"
          />
        </div>
      </div>

      <!-- Column 2 -->
      <div class="col-6 -flex justify-content-center">
        <div class="card-container">
        <img 
        src="<?php print Main::url_for("/images/".$logged_user->card_back) ?>" 
            alt="Credit Card" 
            class="credit-card-image"
          />
        </div>
      </div>
</div>

<?php  else: ?>

    <div class="alert alert-warning" role="alert">
  <h3>No card available, please upload.</h3>
</div>

<?php  endif ?>    
</div>



                                <hr>

                                <form class="card mt-2" action="" method="post" enctype="multipart/form-data">

    <h4>Upload new card</h4>

    <div class="mt-3">
        <div class="form-group">
            <label for="card_front">CARD FRONT</label>
            <input class="form-control" type="file" name="card_front" id="card_front" required>
        </div>

        <div class="form-group">
            <label for="card_back">CARD BACK</label>
            <input class="form-control" type="file" name="card_back" id="card_back" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>
</form>

                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="../bankassets/js/jquery.bundle.js"></script>

        </div>
    </div>

    <script src="../bankassets/js/chart.js"></script>
    </div>

    <p id="error" style='display: none '></p>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        body {
            background-color: #140123;
        }
    </style>

<?php require_once SHARED_PATH . "/footer.php";