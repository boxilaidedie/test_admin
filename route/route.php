<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


//登录页面
Route::get('', '/admin');
Route::get('/admin', 'admin/Account/login');
//管理员界面
Route::post('/admin/dologin', 'admin/Account/dologin');
Route::post('/admin/admins/addAdmin', 'admin/admins/addAdmin');
Route::post('/admin/admins/editAdmin', 'admin/admins/editAdmin');
Route::get('/admin/home', 'admin/Home/index');
Route::get('/admin/admins', 'admin/admins/index');


return [

];
