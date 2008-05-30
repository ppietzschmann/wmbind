<?php
/**
 * @package MVC  
 */

//error_reporting(E_ALL);
error_reporting(E_ALL | E_STRICT);
if (version_compare(phpversion(), '5.1.0', '<') == true)
	die('PHP 5.1 Only');

/**
 * Start session
 */
session_start();

/**
 * Include smarty
 */
require('smarty/libs/Smarty.class.php');

/**
 * Define the directory separator  
 */
define ('DIRSEP', DIRECTORY_SEPARATOR);

// Get siste path
$sitePath = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP;

/**
 * Defines the local site path  
 */
define ('site_path', $sitePath);

// Get the current site address
$siteAddr = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$siteAddr = explode('/', $siteAddr, -1);
$siteAddr = implode('/', $siteAddr);

/**
 *  Defines the site address
 */
define('site_addr', $siteAddr);

// Autoload missing classes
function __autoload($className)
{
	$filename = strtolower($className) . '.php';
	$file = site_path . 'classes' . DIRSEP . $filename;

	if (file_exists($file) == false) {
		return false;
	}

	include($file);
}


?>
