<?
require_once('main.php');
?>
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
  <?
    $session = $_COOKIE["session"];
    $studentNumber = $_COOKIE["studentNumber"];
    if(authenticate($studentNumber,$session)){
  ?>
  
    <br>
    <br>
    <br>
    <a href="http://127.0.0.1:8084/index.php" class="btn btn-warning">education</a>
    <br>
    <br>
    <br>
    <a href="http://127.0.0.1:8082/index.php" class="btn btn-success">nutrition</a>
    <br>
    <br>
    <br>
    <a href="http://127.0.0.1:8081/index.php" class="btn btn-danger">library</a>
    <?}else{?>
    <br>
    <br>
    <br>
    <a href="http://127.0.0.1:8082/index.php">please go to login page</a>
    <?}?>
  </div>
</div>
</body>
</html>
