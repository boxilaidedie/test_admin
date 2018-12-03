<?php
namespace app\admin\controller;
use think\Controller;
use Util\data\Sysdb;
use think\Request;
class Admins extends Controller{
    public function index(){
        $this->db = new Sysdb();
        $userInfo = $this->db->table('admin')->list();
        $this->assign('userInfo',$userInfo);
        return view('admins');
    }

    public function add_admin(){
        $msg = array('code'=>0,'msg'=>'添加成功');
        exit( json($msg));
    }

    public function edit_admin(){
        
        $msg = array('code'=>0,'msg'=>'修改成功');
        exit( json($msg));
    }
}