<?php
namespace app\admin\controller;
use think\Controller;
use Util\data\Sysdb;
use think\Request;
class Home extends Controller{
    public function index(){
        $admin = session('admin')?session('admin'):false;
        $username = $admin['username'];
        $this->assign('username', $username);
        return view('home');
    }
    public function welcome(){
        return view('welcome');
    }
    public function quit(){
        session(null);
        return redirect('/admin');
    }
}