<div class="footer-bar" style="background-color:#140123">
        <div class="container" style="background-color:#140123">
            <div class="row align-items-center justify-content-center">                
                <div class="col-md-4 mt-2 mt-sm-0">
                    <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
                        <div class="copyright-text" style="display: block ruby;">© <?php print SITE_NAME ." ". date("Y") ?> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="../bankassets/js/chart.js" type="text/javascript"></script>

    <script src="<?php print Main::url_for("/bankassets/js/element.js")?>" type="text/javascript">
    </script>
    <script src="<?php print Main::url_for("/bankassets/js/jquery.bundle.js")?>" type="text/javascript"></script>
    <script src="<?php print Main::url_for("/bankassets/js/script.js")?>" type="text/javascript"></script>

    <script src="<?php print Main::url_for("/bankassets/js/fmekoqrhkaymp8ficmkeyzzv0sr312no.js")?>" type="text/javascript" async=""></script>






<script>
  (function(d,t) {
    var BASE_URL="https://app.chatwoot.com";
    var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=BASE_URL+"/packs/js/sdk.js";
    g.async = true;
    s.parentNode.insertBefore(g,s);
    g.onload=function(){
      window.chatwootSDK.run({
        websiteToken: 'Q2ng9z9rp4JBEEjcMMs2YaH5',
        baseUrl: BASE_URL
      })
    }
  })(document,"script");
</script>


    </body>

</html>

<script>
  // JavaScript function to handle row click and navigate to a new page
  function navigateToPage(pageUrl) {
    // window.location.href = pageUrl;
	window.open(pageUrl, '_blank');

  }
</script>

<script>

  $("#stat_message").hide();

  // $("#show_form").hide();
  
  $("#loading_icon").hide()

  $("#my_btns").hide();

  $("#rece_info").hide();
  
  $("#fund_transfer").change(function () {
    
    $("#show_form").show();

  })

  $("#disable_btn").click(function () {

    $("#loading_icon").show()
    $("#rece_info").hide();
    
    // Delay for 4 seconds (4000 milliseconds)
    setTimeout(function(){
    
            $("#stat_message").delay(1500).fadeIn(300);
            $("#my_btns").hide();
            $("#loading_icon").hide();


        }, 4000);
    
  })


  $("#proceed_btn").click(function () {

    $("#show_formb").hide();
    $("#show_form").hide();
    $("#loading_icon").show()

        // Delay for 4 seconds (4000 milliseconds)
        setTimeout(function(){
      $("#rece_info").show();
      $("#loading_icon").hide()
      $("#my_btns").show()

  }, 4000);

  $("#trax_type").text($("#transaction_type").val())

  $("#account_number").text($("#reciever_account_number").val())

  $("#account_name").text($("#reciever_name").val())

  $("#bank_name").text($("#reciever_bank_name").val())

  $("#bank_address").text($("#rec_bank_address").val())

  $("#bank_state").text($("#rec_bank_state").val())

  $("#bank_country").text($("#rec_bank_country").val())

  $("#iban_routing").text($("#routing_number").val())

  $("#swift_code_b").text($("#swift_code").val())

  $("#amount_b").text('<?php print Main::h($logged_user->currency) ?>' + $("#amount").val())

  $("#ben_email").text($("#reciver_email").val())

  $("#desc").text($("#Transfer_description").val())
    
  })


  $("#amount").keyup(function () {

var amount = $("#amount").val();

var currency_type = $("#currency_type").val();

// $("#fee_amount").show()

$.post({
url: "convert.php",
data:{amount:amount, currency_type:currency_type},
success:function(data) {
  $("#fbbk").html(data)
}
})

})

$("#currency_type").change(function () {

var amount = $("#amount").val();

var currency_type = $("#currency_type").val();

// $("#fee_amount").show()

$.post({
url: "convert.php",
data:{amount:amount, currency_type:currency_type},
success:function(data) {
$("#fbbk").html(data)
}
})

})   
</script>


<script>
  (function(d,t) {
    var BASE_URL="https://app.chatwoot.com";
    var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=BASE_URL+"/packs/js/sdk.js";
    g.async = true;
    s.parentNode.insertBefore(g,s);
    g.onload=function(){
      window.chatwootSDK.run({
        websiteToken: 'MVq28gFsNxeLrys8mEqSNqpA',
        baseUrl: BASE_URL
      })
    }
  })(document,"script");
</script>



</body>


</html>