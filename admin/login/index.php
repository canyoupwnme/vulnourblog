<?php include("../../include/settings.php"); ?>
<?php include("../../include/functions.php"); ?>
<?php

  if ($_POST["username"] && $_POST["username"] != "") {
    // login işlemi yapılacak sql inj yok
    $count = login($_POST["username"],$_POST["password"]);

    if ($count == 1) {
      header('Location: auth.php');
    } else {
      print("<p>Girdiğiniz bilgiler hatalı, Lütfen kontrol ederek tekrar deneyiniz.</p>");
    }

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

		<form class="form" action="" method="POST">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" >Login</button>
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
