
            <div class="hk-footer-wrap container-fluid px-xxl-65 px-xl-20">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>© <?php print SITE_NAME ." ". date('Y') ?></p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="<?php print Main::url_for("/vendors/jquery/dist/jquery.min.js")?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php print Main::url_for("/vendors/popper.js/dist/umd/popper.min.js")?>"></script>
    <script src="<?php print Main::url_for("/vendors/bootstrap/dist/js/bootstrap.min.js")?>"></script>

    <!-- Slimscroll JavaScript -->
    <script src="<?php print Main::url_for("/dist/js/jquery.slimscroll.js")?>"></script>

    <!-- Fancy Dropdown JS -->
    <script src="<?php print Main::url_for("/dist/js/dropdown-bootstrap-extended.js")?>"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="<?php print Main::url_for("/dist/js/feather.min.js")?>"></script>

    <!-- Toggles JavaScript -->
    <script src="<?php print Main::url_for("/vendors/jquery-toggles/toggles.min.js")?>"></script>
    <script src="<?php print Main::url_for("/dist/js/toggle-data.js")?>"></script>
  
  <!-- Morris Charts JavaScript -->
    <script src="<?php print Main::url_for("/vendors/raphael/raphael.min.js")?>"></script>
    <script src="<?php print Main::url_for("/vendors/morris.js/morris.min.js")?>"></script>
  
  <!-- Counter Animation JavaScript -->
  <script src="<?php print Main::url_for("/vendors/waypoints/lib/jquery.waypoints.min.js")?>"></script>
  <script src="<?php print Main::url_for("/vendors/jquery.counterup/jquery.counterup.min.js")?>"></script>
  
  <!-- EChartJS JavaScript -->
    <script src="<?php print Main::url_for("/vendors/echarts/dist/echarts-en.min.js")?>"></script>
    
  <!-- Sparkline JavaScript -->
    <script src="<?php print Main::url_for("/vendors/jquery.sparkline/dist/jquery.sparkline.min.js")?>"></script>
  
  <!-- Vector Maps JavaScript -->
    <script src="<?php print Main::url_for("/vendors/vectormap/jquery-jvectormap-2.0.3.min.js")?>"></script>
    <script src="<?php print Main::url_for("/vendors/vectormap/jquery-jvectormap-world-mill-en.js")?>"></script>
    <script src="<?php print Main::url_for("/dist/js/vectormap-data.js")?>"></script>

  <!-- Owl JavaScript -->
    <script src="<?php print Main::url_for("/vendors/owl.carousel/dist/owl.carousel.min.js")?>"></script>
  
  <!-- Toastr JS -->
    <script src="<?php print Main::url_for("/vendors/jquery-toast-plugin/dist/jquery.toast.min.js")?>"></script>
    
    <!-- Init JavaScript -->
    <script src="<?php print Main::url_for("/dist/js/init.js")?>"></script>
  <script src="<?php print Main::url_for("/dist/js/dashboard-data.js")?>"></script>

<script src="<?php print Main::url_for("/dist/js/validation-data.js")?>"></script>  

  <script>
//Add Images to post
$(function() {
"use strict";
$("#cover_photo_post").click(function(e) {
  e.preventDefault();
})
$(".cover_photo_post").click(function() {
  var $cover_photo = jQuery.trim($("#cover_photo").val());
  var $add_images_post = $(this).attr('value') ;

  $("#cover_photo").focus().val(jQuery.trim($cover_photo + $add_images_post ) );

})
})
</script>

 <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      if ($(this).hasClass("fa-times")) {
      $(this).removeClass("fa-times")
      $(this).addClass("fa-bars")
      }else if($(this).hasClass("fa-bars")){
      $(this).removeClass("fa-bars")
      $(this).addClass("fa-times")
      }
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  
</body>

</html>
<?php  Database::db_disconnect($db); ?>