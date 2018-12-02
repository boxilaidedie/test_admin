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



Route::get('', 'admin/Account/login');
Route::get('admin', 'admin/Account/login');
Route::post('admin/dologin', 'admin/Account/dologin');
Route::get('admin/home', 'admin/Home/index');

Route::get('admin/admins', 'admin/admins/index');
return [

];
