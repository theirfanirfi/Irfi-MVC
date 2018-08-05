<?php 
/*
@ Global Functions file
@ User can register custom functions in the @globalfunctions.php file
@ global functions can be used through out the app. Such functions have global scope.
*/

require_once 'GlobalFunctions/globalfunctions.php';

/*
@ Core Files
@ This section include core files of the MVC.
@ Do not make any changes in the following files.
*/

require_once 'configuration/database.php';
global $database;
require_once 'core/App.php'; 
require_once 'core/controller.php'; 
require_once 'core/Model.php'; 
require_once 'core/Authentication.php'; 

/* 
 @('Authentication Controllers')
 @ Register Authentication controllers Here.
*/


require_once 'Authentication/Auth.php';
?>