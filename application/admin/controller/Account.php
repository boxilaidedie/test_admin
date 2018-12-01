<?php

namespace app\admin\controller;
use think\Controller;
use Util\data\Sysdb;
class Account extends Controller{
    public function login(){
        $db = new Sysdb;
        $map[] = ['id','=','1'];
        $rs= $db->table('admin')->field('id,add_time,username,password')->where($map)->item();
        dump( $rs);
        return view('login');
    }
}