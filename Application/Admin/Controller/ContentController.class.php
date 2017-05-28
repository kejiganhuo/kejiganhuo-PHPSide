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
        if($_POST){
            if (!isset($_POST['tiltle']) || !$_POST['title']){
                return show(0,'标题不存在！');
            }
            if (!isset($_POST['small_tiltle']) || !$_POST['small_title']){
                return show(0,'短标题不存在！');
            }
            if (!isset($_POST['catid']) || !$_POST['catid']){
                return show(0,'文章栏目不存在！');
            }
            if (!isset($_POST['keywords']) || !$_POST['keywords']){
                return show(0,'关键字不存在！');
            }

            $newsId = D("News")->insert($_POST);
            if($newsId){
                $newsContentData['content'] = $_POST['content'];
                $newsContentData['news_id'] = $newsId;
                $cId = D("MewsContent")->insert('$newsContentData');
                if($cId){
                    return show(1,'新增成功');
                }else {
                    return show(1, '主表插入成功，附表插入失败！');
                }
            }else{
                return show(1,'新增失败！');
            }
        }else {
            $webSiteMenu = D('Menu')->getBarMenus();
            $titleFontColor = C("TITLE_FONT_COLOR");
            $copyFrom = C("COPT_FROM");
            $this->assign('webSiteMenu', $webSiteMenu);
            $this->assign('titleFontColor', $titleFontColor);
            $this->assign('copyfrom', $copyFrom);
            $this->display();
        }
    }

}