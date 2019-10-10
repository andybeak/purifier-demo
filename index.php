<?php

require('vendor/autoload.php');

// In this particular case this is not helpful, but remember to set content-type headers properly when returning JSON
header('Content-Type: text/html; charset=utf-8');

// we can use content security to prevent inline scripts, which will block injection
header("Content-Security-Policy: default-src: 'self'; script-src: 'self' localhost");

// this will largely prevent cookie stealing by itself
ini_set( 'session.cookie_httponly', 1 );
session_start();

// output static header where we do not include any user input
require('static/header.php');

// start output buffering and capture the part of the page where we allow user input
ob_start();
require('site/index.php');
$rawOutput = ob_get_clean();

// create an instance of HTML purifier with HTML5 support (https://github.com/xemlock/htmlpurifier-html5)
$config = HTMLPurifier_HTML5Config::createDefault();
$purifier = new HTMLPurifier($config);

// clean the html and output it
$cleanOutput = $purifier->purify($rawOutput);
echo $cleanOutput;

// output static footer where we do not include any user input
require('static/footer.php');