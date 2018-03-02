<?php
namespace core;
/**
 * Created by PhpStorm.
 * User: wj992
 * Date: 2018/3/2
 * Time: 15:12
 */
class pawn
{
    public static $classMap=array();
    public $assign=array();
    public static function load($class){
        $class=str_replace('\\','/',$class);
        $file=PAWN.$class.".php";
        if(!isset(self::$classMap[$class])){
            if(is_file($file)){
                include_once $file;
            }
        }

    }

    public static function run(){
        $route=new \core\lib\routes();
        $controller=$route->controller;
        $function=$route->function;
        $controllerFile=APP."controller".DIRECTORY_SEPARATOR.$controller."Controller.php";
        if(is_file($controllerFile)){
            $className='\app\controller\\'.$controller."Controller";
            $class=new $className();
            $class->$function();
        }else{
            throw new \Exception("找不到控制器".$controller);
        }
    }

    public function assign($name,$value){
        $this->assign[$name]=$value;
    }

    public function display($file){
        $file=APP.'view'.DIRECTORY_SEPARATOR.$file;

        if(is_file($file)){
            extract($this->assign);
            include_once $file;
        }else{
            throw new \Exception("视图文件未找到");
        }

    }
}