<?php

//
// PHASE: BOOTSTRAP
// Initialization phase in which all the basics are stablished and defined.
//
define('MUFFINPHP_INSTALL_PATH', dirname(__FILE__));
define('MUFFINPHP_SITE_PATH', MUFFINPHP_INSTALL_PATH . '/site');

require(MUFFINPHP_INSTALL_PATH.'/src/CMuffinPHP/bootstrap.php');

$muff = CMuffinPHP::Instance();

//
// PHASE: FRONTCONTROLLER ROUTE
//FC takes care of the requests made, then FC interprets and decides which methods to call.
//
$muff->FrontControllerRoute();

//
// PHASE: THEME ENGINE RENDER
// Creates the view, the template in which is going to be rendered the website.
//
$muff->ThemeEngineRender();