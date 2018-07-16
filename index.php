
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="base.css">
  <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div>
  <div class="tac">
    <img src="image/login.png"><br><br>

    <form action="check.php" method="post">
      <input type="text" class="ltr" placeholder="<?="شماره دانشجویی"?>" name="studentNumber"><br>
      <br>
      <input type="password" class="ltr" placeholder="<?="رمز عبور"?>" name="password"><br>
      <br>
      <br>
      <button type="submit" class="btn btn-info"><?="ورود"?></button>
    </form>

    <br>
    <br>
    <br>
  </div>
</div>
</body>
</html>