<?php
namespace core\lib;

class routes{
    public $controller;
    public $function;
    public function __construct(){
//        var_dump($_SERVER);
//        exit;

        if(isset($_SERVER['REQUEST_URI'])&&$_SERVER['REQUEST_URI']!="/"){
            $path=$_SERVER['REQUEST_URI'];
            $pathArr=explode("/",trim($path,"/"));

            if(isset($pathArr[0])){
                $this->controller=$pathArr[0];
            }
            if(isset($pathArr[1])){
                $this->function=$pathArr[1];
            }else{
                $this->function="index";
            }
            $count=count($pathArr);
            if($count>2){
                $i=2;
                while($i<=$count) {
                    if(isset($pathArr[$i+1]))
                        $_GET[$pathArr[$i]] =$pathArr[$i+1];
                    $i=$i+2;
                }
            }
        }else{
            $this->controller="index";
            $this->function="index";
        }

//        var_dump($_GET);
    }
}