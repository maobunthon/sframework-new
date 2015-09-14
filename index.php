<?php

error_reporting(E_ALL);
session_start();

$system_path = 'app';
$image_path = 'images';

// Set the current directory correctly for CLI requests
if (defined('STDIN')) {
	chdir(dirname(__FILE__));
}

if (realpath($system_path) !== FALSE) {
	$system_path = realpath($system_path) . '/';
}
if (realpath($image_path) !== FALSE) {
	$image_path = realpath($image_path) . '/';
}

// ensure there's a trailing slash
$system_path = rtrim($system_path, '/') . '/';
$image_path = rtrim($image_path, '/') . '/';

// Is the system path correct?
if (!is_dir($system_path)) {
	exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: " . pathinfo(__FILE__, PATHINFO_BASENAME));
}
// Is the system path correct?
if (!is_dir($image_path)) {
	exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: " . pathinfo(__FILE__, PATHINFO_BASENAME));
}

// The name of THIS file
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// The PHP file extension
// this global constant is deprecated.
define('EXT', '.php');

// Path to the system folder
define('HOMEPATH', str_replace("\\", "/", $image_path));
define('BASEPATH', str_replace("\\", "/", $system_path));

// Path to the front controller (this file)
define('FCPATH', str_replace(SELF, '', __FILE__));

// Name of the "system folder"
define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));
define('IMGDIR', trim(strrchr(trim(HOMEPATH, '/'), '/'), '/'));

require_once (BASEPATH."config/define.php");

require_once (BASEPATH.'init.php');

$app = new App;