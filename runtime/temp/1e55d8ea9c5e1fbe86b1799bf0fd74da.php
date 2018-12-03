<?php /*a:1:{s:72:"D:\wwwroot\thinkphp.test\think\application\admin\view\account\login.html";i:1543822096;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="/static/plugin/layui/layui.js"></script>
    <link rel="stylesheet" href="/static/plugin/layui/css/layui.css">

    <title>后台管理系统</title>
</head>

<body style="background:#1E9FFF">
    <div style="position:absolute;left:50%;top:50%;margin-left: -250px;margin-top:-200px;width:500px">
        <div style="background:#fff;border-radius:4px;padding:20px 20px 20px 20px;box-shadow: 5px 5px 20px #444444;">
            <form class="layui-form">
                <div class="layui-form-item" style="color: grey">
                    <h2>后台管理系统</h2>
                </div>
                <hr>
                </hr>
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-block">
                        <input type="text" id="username" required lay-verify="required" 
                            autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密&nbsp;&nbsp;&nbsp;码</label>
                    <div class="layui-input-block">
                        <input type="text"  id="password" required lay-verify="required"
                            autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">验证码</label>
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input" id="verifycode">
                    </div>
                   <img src="<?php echo captcha_src(); ?>" style="width:150px;height:35px;cursor:pointer;" id="verify_img" onclick="refreshVerify()">
                   <a href="javascript:refreshVerify()">点击刷新</a>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" type="button" onclick="dologin()">登录</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
layui.use(['layer'],function(){
    $ = layui.jquery;
    layer = layui.layer;
    $('#username').focus();
    $('input').keydown(function(e){
        if(e.keyCode==13){
            dologin();
        }
    })
});
    function dologin() {
        var username = $.trim($('#username').val());
        var pwd = $.trim($('#password').val());
        var verifycode = $.trim($('#verifycode').val());
        if (username == '') {
            layer.alert('请输入用户名', { icon: 2 });
            return false;
        }else if (pwd == '') {
            layer.alert('请输入密码', { icon: 2 });
            return false;
        }else if (verifycode == '') {
            layer.alert('请输入验证码', { icon: 2 });
            return false;
        } else {
            var data = { 'username':  username, 'pwd': pwd, 'verifycode': verifycode };
            console.log(data)
            $.post('/admin/dologin', data, function (res,status) {
                //var res = JSON.parse(res);
                console.log(res)
                if (res.code > 0) {
                    layer.alert(res.msg);
                    window.location.href = '/admin';
                } else {
                    layer.msg(res.msg);
                    setTimeout(() => {
                        window.location.href = '/admin/home';
                    }, 1000);
                }
            },'json')
        }
    }

    function refreshVerify() {
        var ts = Date.parse(new Date())/1000;
        var img = document.getElementById('verify_img');
        img.src = "/captcha?id="+ts;
    }

</script>

</html>