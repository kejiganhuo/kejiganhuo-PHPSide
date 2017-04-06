<?php
namespace Common\Model;
use Think\Model;

class AdminModel extends Model{
	
	private $_db = '';
	public function __construct(){
		$this->_db = M('Admin');
	}
	public function getAdminByUsername($username){
		$ret = $this->_db->where('username="'.$username.'"')->find();
		return $ret;
	}
}