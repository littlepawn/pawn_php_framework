<?php

define("PAWN",realpath("./").DIRECTORY_SEPARATOR);
define("CORE",PAWN."core".DIRECTORY_SEPARATOR);
define("APP",PAWN."app".DIRECTORY_SEPARATOR);

define("DEBUG",true);
if(DEBUG){
    ini_set("display_error","On");
}else{
    ini_set("display_error","Off");
}

include CORE."common/function.php";
require_once CORE."pawn.php";

spl_autoload_register('\core\pawn::load');
\core\pawn::run();