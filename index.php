<?php
//turn on output buffer
ob_start();

//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//require auto-load file
require_once('vendor/autoload.php');

//start session
session_start();
//edited var_dump($_SESSION);

//Create an instance of the Base class
$f3 = Base::instance();
$con = new Controller($f3);

//instantiate new data layer object
$dataLayer = new DataLayer();

//instantiate new member object
$member = new Member();

//define default route
$f3->route('GET /', function(){

    $GLOBALS['con']->home();

});

//define personal-info route
$f3->route('GET|POST /personal', function($f3){

    $GLOBALS['con']->personal();

});

//define profile route
$f3->route('GET|POST /profile', function($f3){

    $GLOBALS['con']->profile();

});

//define interests route for premium member
$f3->route('GET|POST /interests', function($f3){

    $GLOBALS['con']->interests();

});

//define summary route
$f3->route('GET /summary', function(){

    $GLOBALS['con']->summary();

});

//define admin route
$f3->route('GET /admin', function(){

    $GLOBALS['con']->admin();

});

//run fat-free
$f3->run();

//send output to browser
ob_flush();