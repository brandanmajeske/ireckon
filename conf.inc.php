<?php

//Defines constants to use for "include" URLS - helps keep our paths clean

       /* define("REGISTRY_CLASSES",  $_SERVER['DOCUMENT_ROOT']."/SOAP/classes/");
        define("REGISTRY_CONTROLS", $_SERVER['DOCUMENT_ROOT']."/SOAP/controls/");

        define("STRING_BUILDER",     REGISTRY_CLASSES. "stringbuilder.php");
        define("SESSION_MANAGER",     REGISTRY_CLASSES. "sessionmanager.php");
        define("STANDARD_CONTROLS",    REGISTRY_CONTROLS."standardcontrols.php");*/

  // host path will be modified after development phase

  $host = "http://".$_SERVER['HTTP_HOST'].'/ireckon/';
  $css = $host.'css';
  $index = $host.'index.php';
  
?>