<?php
$requestScheme = isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'http';

define('WEB_PATH', $requestScheme.'://'.$_SERVER['HTTP_HOST']);
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);
session_start();
?>
