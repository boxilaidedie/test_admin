<?php
namespace app\admin\controller;
use think\Controller;
use Util\data\Sysdb;
use think\Db;
class Account extends Controller{
    //渲染登录页面
    public function login(){
        if(session('admin')){
            return redirect('/admin/home');
        }else{
            return view('login');
        }
    }
    //验证密码用户名提交后处理逻辑
    public function dologin(){
        $username =input('post.username');
        $pwd = trim(input('post.pwd'));
        $verifycode = trim(input('post.verifycode'));
        if($username == ''){
            $msg = array('code'=>1,'msg'=>'用户名不能为空');
            return json($msg);
        }
        if($pwd == ''){
            $msg = array('code'=>1,'msg'=>'密码不能为空');
            return json($msg);
        }
        if($verifycode == ''){
            $msg = array('code'=>1,'msg'=>'请输入验证码');
            return json($msg);
        }
        //验证验证码是否正确
        if(!captcha_check($verifycode)){
            $msg = array('code'=>1,'msg'=>'验证码错误');
            return json($msg);
        }
        //验证用户名
        $this->db = new Sysdb;
        $map[]=['username','=',$username];
        $admin = $this->db->table('admin')->where($map)->item();
        // $admin =  Db::table('admin')->where($map)->find();
        if(!$admin){
            exit(json_encode(array('code'=>1,'msg'=>'用户名不存在')));
        }
        if($admin['password']!= $pwd){
            exit(json_encode(array('code'=>1,'msg'=>'密码不正确')));
        }
        if($admin['status'] == 1){
            exit(json_encode(array('code'=>1,'msg'=>'用户已被禁用')));
        }
       // 设置用户session
        session('admin',$admin);
        exit(json_encode(array('code'=>0,'msg'=>'登录成功')));
    }
}