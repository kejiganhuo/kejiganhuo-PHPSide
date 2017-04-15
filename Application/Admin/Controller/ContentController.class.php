<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
/**
 * 文章内容管理
 */
class ContentController extends CommonController {

    public function index(){
        $this->display();
    }
    public function add(){
        $this->display();
    }

}