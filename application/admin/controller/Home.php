<?php
namespace app\admin\controller;
use think\Controller;
use Util\data\Sysdb;
use think\Request;
class Home extends Controller{
    public function index(){
        return view('home');
    }
    public function welcome(){
        return view('welcome');
    }
}