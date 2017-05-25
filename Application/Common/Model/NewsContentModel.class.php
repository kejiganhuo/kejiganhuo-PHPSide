<?php
namespace Common\Model;
use Think\Model;

class NewsContentModel extends Model{
    private $_db='';

    public function __construct()
    {
        $this->_db = M('news_content');
    }

    public function insert($data=array()){
        if(!is_array($data) || $data){
            return 0;
        }
        $data['create_time'] = time();
        if(isset($data['content']) && $data['content']){
            $data['content'] = htmlspecialchars($data['content']);
        }
        return $this->_db->add($data);
    }


}