<?php
namespace Common\Model;
use Think\Model;

class NewsModel extends Model{
    private $_db='';

    public function __construct()
    {
        $this->_db = M('news');
    }

    public function insert($data = array()){
        if(!is_array($data) || !$data){
            return 0;
        }
        $data['create_time'] = time();
        $data['username'] = getLoginUsername();
        return $this->_db->add($data);
    }
    public function getNews($data,$page,$pageSize=10){
        $conditons = $data;
        if(isset($data['title']) && $data['title']){
            $conditons['title'] = array('like','%',$data['title'],'%');
        }
        if(isset($data['catid']) && $data['catid']) {
            $conditons['catid'] = intval($data['catid']);
        }
        $conditons['status'] = array('neq',-1);

        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($conditons)
            ->order('listorder desc ,news_id desc')
            ->limit($offset,$pageSize)
            ->select();

        return $list;

    }
    public function getNewsCount($data = array()){
        $conditons = $data;
        if(isset($data['title']) && $data['title']){
            $conditons['title'] = array('like','%',$data['title'],'%');

        }
        if(isset($data['catid']) && $data['catid']) {
            $conditons['catid'] = intval($data['catid']);
        }
        $conditons['status'] = array('neq',1);

        return $this->_db->where($conditons)->count();
    }

}