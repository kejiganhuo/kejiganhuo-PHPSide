<?php
namespace Common\Model;
use Think\Model;

class MenuModel extends Model{
    private $_db = '';
	public function __construct(){
		$this->_db = M('Menu');
	}
	public function insert($data = array()){
		if(!data || !is_array($data)){
			return(0);
		}
		return $this->_db->add($data);
	}
	//获取相应菜单数据
	public function getMenus($data,$page,$pageSize=10){
		$data['status'] = array('neq',-1);
		$offset = ($page - 1) * $pageSize;
		$list = $this->_db->where($data)->order('listorder desc,menu_id desc')->limit($offset,$pageSize)->select();
		console.log($list);
		return $list;
		
		
	}
	//获取相应条件的总数
	public function getMenusCount($data=array()){
		$data['status'] = array('neq',-1);
		return $this->_db->where($data)->count();
		
	}
	//
	public function find($id){
		if(!$id || !is_numeric($id)){
			return array();
		}
		return $this->_db->where('menu_id='.$id)->find();
	}
	//菜单更新
	public function updateMenuById($id,$data){
		if(!$id || !is_numeric($id)){
			throw_exception('ID不合法');
		}
		if(!$data || !is_array($data)){
			throw_exception('更新的数据不合法');
		}
		$this->_db->where('menu_id='.$id)->save($data);
	}
	//菜单删除
	public function updateStatusById($id,$status){
		if(!is_numeric($id)||!$id){
			throw_exception("ID不合法");
		}
		if(!is_numeric($status)||!$status){
			throw_exception("状态不合法");
		}
		$data['status']=$status;
		return $this->_db->where('menu_id='.$id)->save($data);
	}
	public function updateMenuListorderById($id,$listorder){
		if(!$id || !is_numeric($id)){
			throw_exception('ID不合法');
		}
		
		$data =array(
			'listorder' => intval($listorder),
		);
		
		return $this->_db->where('menu_id='.$id)->save($data);
	}
	public function getAdminMenus(){
	    $data =array(
	        'status' => array('neq',-1),
            'type' => 1,
        );
	    return $this->_db->where($data)->order('listorder desc,menu_id desc')->select();
    }

}
?>