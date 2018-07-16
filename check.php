<?
require_once('main.php');

$studentNumber = $_POST['studentNumber'];
$password = $_POST['password'];

$logedIn = login($studentNumber,$password);
if(isset($logedIn)){
setcookie("session", $logedIn, time()+3600, "/","", 0);
setcookie("studentNumber", $studentNumber, time()+3600, "/","", 0);
  $message = "ورود شما موفقیت آمیز بود";
    require_once("succeed.php");
    exit;
}else {
    $message = "ورود شما ناموفق بود. مجددا تلاش کنید";
    require_once("failed.php");
    exit;
  }
?>
