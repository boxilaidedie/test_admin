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
        if($result){
           $msg = array('code'=>0,'msg'=>'添加成功');
           return json($msg);
        }else{
            $msg = array('code'=>1,'msg'=>'添加失败');
            return json($msg);
        }
        
    }

    public function editAdmin(){
        $role = input('post.role');
        $status = input('post.status');
        $id = input('post.usrid');
        $userInfo = ['gid'=>$role,'status'=>$status];
        $this->db = new Sysdb();
        $map[]=['id','=',$id];
        $result = $this->db->table('admin')->where($map)->update($userInfo);
        if($result){
            $msg = array('code'=>0,'msg'=>'修改成功');
            return json($msg);
         }else{
             $msg = array('code'=>1,'msg'=>'修改失败');
             return json($msg);
         }
    }
}