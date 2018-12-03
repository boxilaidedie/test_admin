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
        
        return view('admins');
    }
}