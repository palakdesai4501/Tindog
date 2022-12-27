<?php 

spl_autoload_register('myAutoLoader');

function myAutoLoader ($classname) {
   $extention = ".php"; 
   $path = $classname . $extention;
   
   if (!file_exists($path)) {
      return false;
   }
   
   include_once $path;
}

?>
   