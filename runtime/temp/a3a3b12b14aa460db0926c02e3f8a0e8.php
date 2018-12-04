<?php /*a:1:{s:68:"D:\wwwroot\thinkphp.test\think\application\admin\view\home\home.html";i:1543884450;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/static/plugin/layui/layui.js"></script>
    <link rel="stylesheet" href="/static/plugin/layui/css/layui.css">
    <title>Document</title>
</head>
<style>
    .item-r {
        float: right;
        margin-right: 15px;
    }

    .menu {
        float: left
    }

    .main {
        float: left
    }
</style>

<body>
    <div class="header">
        <ul class="layui-nav" style="background:#1E9FFF;">
            <li class="layui-nav-item">
                <span>后台管理系统</span>
            </li>
            <li class="layui-nav-item item-r">
                <a href="">控制台<span class="layui-badge">9</span></a>
            </li>
            <li class="layui-nav-item item-r"">
              <a href="">个人中心<span class=" layui-badge-dot"></span></a>
            </li>
            <li class="layui-nav-item item-r"">
              <a href=""><img src="//t.cn/RCzsdCq" class="layui-nav-img"><?php echo htmlentities($username); ?></a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;">修改信息</a></dd>
                    <dd><a href="javascript:;">安全管理</a></dd>
                    <dd><a href="/admin/home/quit">注销</a></dd>
                </dl>
            </li>
        </ul>
    </div>
    <div class="menu">
        <ul class="layui-nav layui-nav-tree layui-inline" id="menu">
            <li class="layui-nav-item nav-item">
                <a href="javascript:;">管理员管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" src="/admin/admins" onclick="set_admins()">管理员列表</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item nav-item">
                <a href="javascript:;">权限管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="">移动模块</a></dd>
                    <dd><a href="">后台模版</a></dd>
                    <dd><a href="">电商平台</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item nav-item">
                <a href="javascript:;">系统设置</a>
                <dl class="layui-nav-child">
                    <dd><a href="">移动模块</a></dd>
                    <dd><a href="">后台模版</a></dd>
                    <dd><a href="">电商平台</a></dd>
                </dl>
            </li>

        </ul>
    </div>

    <div class="main">
        <iframe src="/admin/home/welcome" style="width:100%;" frameborder="no" border="0" marginwidth="0" marginheight="0"
            scrolling="no" allowtransparency="yes"></iframe>
    </div>
</body>
<script>
    layui.use(['element'], function () {
        $ = layui.jquery;
        layer = layui.layer;
        set_menu_height(); //设置菜单高度
        set_main_height();//设置main高度
        set_main_width();
        $(window).resize(function () {
            set_menu_height(); //设置菜单高度
            set_main_height();//设置main高度
            set_main_width();
        });

        var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块
        //监听导航点击
        element.on('nav(demo)', function (elem) {
            layer.msg(elem.text());
        });
    });
    function set_admins() {
        $('.main iframe').attr('src', '/admin/admins');
    }

    function set_menu_height() {
        var wH = $(window).height();
        console.log(wH)
        $('#menu').css('height', wH - 60);
    }
    function set_main_height() {
        var wH = $(window).height();
        $('.main iframe').css('height', wH - 60);
    }

    function set_main_width() {
        var wH = $(window).width();
        var menu_W = $('#menu').width();
        $('.main iframe').css('width', wH - menu_W);
    }

</script>

</html>