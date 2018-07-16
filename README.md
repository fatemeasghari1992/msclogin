![dependencies none](https://img.shields.io/badge/Dependencies-none-brightgreen.svg)
![PHP 5.6+](https://img.shields.io/badge/PHP-5.6+-green.svg)
![bootstrap 3.3.5](https://img.shields.io/badge/bootstrap-3.3.5-green.svg)
![JQuery 1.11.3](https://img.shields.io/badge/JQuery-1.11.3-green.svg)
# سیستم ورود و خروج (لاگین)

###### ساختار کلی پروژه
  - common.php : توابع مورد نیاز برنامه که به صورت ماژولار نوشته شده اند
  - failed.php , success.php : نمایش پیام های مربوط به عملیات موفقیت آمیز یا خطاهای احتمالی
  - index.php : صفحه ناوبری که بعد از ورود به کاربر نمایش داده میشود
  - menu.php : لینک دسترسی به صفحات دیگر سیستم در این فایل قرار گرفته است
  - check.php : لاگین بودن کاربر را بررسی میکند. اینکار با استفاده از بررسی session صورت میگیرد
# ورود به سیستم :
عمل لاگین یا ورود به سیستم توسط تابع زیر پیاده سازی شده است :
``` php
function login($studentNumber, $password){
	$url = "http://"."172.17.0.1".":8080/student/login?studentNumber="."$studentNumber"."&password="."$password";

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => $url,
		CURLOPT_USERAGENT => 'Codular Sample cURL Request'
	));
	$resp = curl_exec($curl);
	// Close request to clear up some resources
	curl_close($curl);
	$r = (json_decode($resp, true));

	$tmp = $r['result'];
	if($r['status'] == 200 ){
	 return $tmp['session'];
	}
}
```
این تابع شماره دانشجویی و کلمه ی عبور را به عنوان پارامتر ورودی میپذرید و سپس با ارسال درخواست به ادرس زیر ,عملیات ورود به سیستم را انجام میدهد
میدهد:
ادرس وب سرویس به صورت زیر است
``` url
http://"."172.17.0.1".":8080/student/login
```
شماره دانش اموزش و کلمه عبور به صورت کوئری استرینگ (query string)به این ادرس اظافه میشوند و سپس درخواست ورود با استفاده از کتابخانه ی Curl انجام میشود.
پاسخ دریافتی از با فرمت json است و نیاز به دیکد کردن دارد.
با استفاده از تابع json_decode پاسخ دریافتی را به ارایه تبدیل میکنیم تا قابل استفاده شود.
در صورتی که عمل لاگین با موفقیت انجام شود سشن برگردانده شده را میتوان در مراحل بعدی به منظور تایید هویت به سرور ارسال کرد و مورد استفاده قرار داد.
## تایید هویت:
عمل تایید هویت با استفاده از تابع زیر پیاده سازی شده است
``` php
function authenticate($studentNumber, $session){
  	$url = "http://"."172.17.0.1".":8080/authenticate?studentNumber="."$studentNumber"."&session="."$session";
  	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => $url,
		CURLOPT_USERAGENT => 'Codular Sample cURL Request'
	));
	$resp = curl_exec($curl);
	// Close request to clear up some resources
	curl_close($curl);
	$r = (json_decode($resp, true));
	if($r['status'] == 200 ){
	 return true;
	}else{
	  return false;
	}
}
```
این تابع با استفاده از شماره دانشجویی و سشن (از مرحله ی لاگین دریافت میشود) جهت تایید هویت استفاده میکند در صورتی که تایید هویت با موفقیت انجام شود مقدار true برگردانده میشود
در اینجا session به صورت توکن برای تایید هویت استفاده میشد. 
### تکنولوژی های استفاده شده در سیستم
تکنولوژی های استفاده شده این سیستم به صورت زیر هستند:

* [php] - یک زبان برنامه نویسی سمت سرور است
* [Bootstrap] - فریمورک بوت استرپ به منظور طراحی ظاهر سامانه
* [jQuery] - جهت تعامل با کاربر
