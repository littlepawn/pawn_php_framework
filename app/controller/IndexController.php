<?php
namespace app\controller;

class IndexController extends \core\pawn {
    public function index(){
//        echo "Hello World!";
        $data="hello world";
        $this->assign("data",$data);
        $this->display("index.html");
    }

    public function haha(){
        $model=new \core\lib\model();
        $sql="select * from user";
        $ret=$model->query($sql);
        print_r($ret->fetchAll());
    }
}