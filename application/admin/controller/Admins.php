<?php
namespace app\admin\controller;
use think\Controller;
use Util\data\Sysdb;
use think\Request;
class Admins extends Controller{
    public function index(){
        return view('admins');
    }
}