<?php include("../../include/settings.php"); ?>
<?php include("../../include/functions.php"); ?>
<?php

  if ($_POST["code"] != "" and $_POST["code"]= "1337") {
    setcookie("isadmin", "c4ca4238a0b923820dcc509a6f75849b", time() + (60*60*24),'/');
    header('Location: ../index.php');
  }else {
    setcookie("isadmin", "cfcd208495d565ef66e7dff9f98764da", time() + (60*60*24),'/');
  }

 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Vulnourblog</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrapper">
  <div class="container">
    <h1>Welcome</h1>
<p>Telefon numaranıza SMS ile güvenlik kodu gönderilmiştir. Lütfen kodu aşağıdaki alana yazınız.</p>
    <form class="form" action="" method="POST">
      <input type="password" name="code" placeholder="SMS Güvenlik Kodu Giriniz.">
      <button type="submit" >Submit</button>
    </form>
  </div>

  <ul class="bg-bubbles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
</body>
</html>
