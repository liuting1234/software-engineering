<?php
define('RAIN',TRUE);
define('ROOT', substr(__FILE__, 0, -9));
define('MODEl_PATH', ROOT.'model/');
define('API_VIEW', strtolower((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'))).'/view/');
define('VIEW_PATH', ROOT.'view/');
define('LIB_PATH', ROOT.'lib/');
define('CONFIG', ROOT.'config/');
define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());

require CONFIG.'config.php';
require LIB_PATH.'db.class.php';

session_start();
if(!empty($_SESSION['user'])){
	define('RAIN_USER',$_SESSION['user']);
	define('RAIN_NAME',$_SESSION['name']);
	define('RAIN_U_RIGHT',$_SESSION['u_right']);
}

unset($GLOBALS, $_ENV, $HTTP_GET_VARS, $HTTP_POST_VARS, $HTTP_COOKIE_VARS, $HTTP_SERVER_VARS, $HTTP_ENV_VARS);
$_GET		= daddslashes($_GET, 1, TRUE);
$_POST		= daddslashes($_POST, 1, TRUE);
$_COOKIE	= daddslashes($_COOKIE, 1, TRUE);
$_SERVER	= daddslashes($_SERVER);
//$_FILES		= daddslashes($_FILES);
$_REQUEST	= daddslashes($_REQUEST, 1, TRUE);

$m = getgpc('m');
$a = getgpc('a');
$m = empty($m) ? 'index': $m;
$a = empty($a) ? 'de' : $a;

if(file_exists(MODEl_PATH.$m.'.class.php')){
	require MODEl_PATH.$m.'.class.php';
	if(method_exists($m,$a)){
		 $re = new $m;
	     $re->$a();
	}else{
		echo 'Action not found';
	}
} else{
	echo 'Model not found!';
}

function daddslashes($string, $force = 0, $strip = FALSE) {
	if(!MAGIC_QUOTES_GPC || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force, $strip);
			}
		} else {
			$string = addslashes($strip ? stripslashes($string) : $string);
		}
	}
	return $string;
}

function getgpc($k, $t='R') {
	switch($t) {
		case 'P': $var = &$_POST; break;
		case 'G': $var = &$_GET; break;
		case 'C': $var = &$_COOKIE; break;
		case 'R': $var = &$_REQUEST; break;
	}
	return isset($var[$k]) ? (is_array($var[$k]) ? $var[$k] : trim($var[$k])) : NULL;
}

?>