<?php
namespace app\admin\controller;
use think\Controller;
use Util\data\Sysdb;
use think\Request;
use think\Db;
class Admins extends Controller{
    public function index(){
        $this->db = new Sysdb();
        $userInfo = $this->db->table('admin')->list();
        $this->assign('userInfo',$userInfo);
        return view('admins');
    }

    public function addAdmin(){

        $username = input('post.username');
        $truename = input('post.truename');
        $pwd = input('post.password');
        $role = input('post.role');
        $status = input('post.status');
        $timestamp = date('Y-m-d H:i:s',time());
        $userInfo = ['username'=>$username,'password'=>$pwd,'gid'=>$role,'status'=>$status,'add_time'=>$timestamp,'truename'=>$truename];
        $this->db = new Sysdb();
        $result = $this->db->table('admin')->insert($userInfo);
        return $userInfo;
        // if($result){
        //     $msg = array('code'=>0,'msg'=>'添加成功');
        //     exit( json($msg));
        // }else{
        //     $msg = array('code'=>1,'msg'=>'添加失败');
        //     exit( json($msg));
        // }
        
    }

    public function edit_admin(){
        
        $msg = array('code'=>0,'msg'=>'修改成功');
        exit( json($msg));
    }
}