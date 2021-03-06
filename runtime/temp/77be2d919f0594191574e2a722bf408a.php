<?php /*a:1:{s:72:"D:\wwwroot\thinkphp.test\think\application\admin\view\admins\admins.html";i:1544002212;}*/ ?>
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
  .admins_main{
  margin-top: 20px;
  margin: 0 auto;
  padding-right: 30px;
  padding-left: 30px;
}
.layui-btn-group{
  margin-top: 15px;
  float: right;
  margin-bottom: 15px;
}
.admin-card{
  border: 1px solid grey;
  border-radius: 5px
}
</style>

<body>
  <div class="admins_main">
    <div class="layui-btn-group">
      <button class="layui-btn layui-btn-sm" type="button" onclick="add_admins()">
        <i class="layui-icon">&#xe654;</i>
      </button>
    </div>
    <table class="layui-table">
      <colgroup>
        <col width="150">
        <col width="200">
        <col>
      </colgroup>
      <thead>
        <tr>
          <th>ID</th>
          <th>用户名</th>
          <th>权限</th>
          <th>状态</th>
          <th>真实姓名</th>
          <th>创建时间</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($userInfo) || $userInfo instanceof \think\Collection || $userInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $userInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
        <tr index=<?php echo htmlentities($data['id']); ?>>
          <td><?php echo htmlentities($data['id']); ?></td>
          <td><?php echo htmlentities($data['username']); ?></td>
          <td><?php echo $data['gid']==0 ? '一般用户' : '超级管理员'; ?></td>
          <td><?php echo $data['status']==1 ? '正常' : '禁用'; ?></td>
          <td><?php echo htmlentities($data['truename']); ?></td>
          <td><?php echo htmlentities($data['add_time']); ?></td>
          <td><button class="layui-btn layui-btn-sm " onclick="edit_admins(this)">编辑</button><button class="layui-btn layui-btn-sm"
              onclick="del_admins()">删除</button></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
  </div>

</body>
<div id="admin-panel-add" style="width:400px;display: none">
  <form class="layui-form" action="/admin/addAdmin" style="margin-top:20px;" method="POST">
    <div class="layui-form-item">
      <label class="layui-form-label">管理员账号</label>
      <div class="layui-input-block">
        <input type="text" name="username" required lay-verify="required" placeholder="请输入管理员账号" autocomplete="off"
          class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">管理员密码</label>
      <div class="layui-input-block">
        <input type="text" name="password" required lay-verify="required" placeholder="请输入管理员密码" autocomplete="off"
          class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">权限</label>
      <div class="layui-input-block">
        <input type="radio" name="role" value="1" title="超级权限">
        <input type="radio" name="role" value="0" title="一般权限" checked>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">管理员姓名</label>
      <div class="layui-input-block">
        <input type="text" name="truename" required lay-verify="required" placeholder="请输入管理员姓名" autocomplete="off"
          class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">是否禁用</label>
      <div class="layui-input-block">
        <input type="checkbox" name="status" lay-skin="switch">
      </div>
    </div>

    <div class="layui-form-item">
      <div class="layui-input-block">
        <button class="layui-btn" lay-submit lay-filter="add_user">立即提交</button>
        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
      </div>
    </div>
  </form>
</div>


<div id="admin-panel-edit" style="width:400px;display: none">
  <form class="layui-form" action="" style="margin-top:20px;">
    <div class="layui-form-item">
      <label class="layui-form-label ">是否禁用</label>
      <div class="layui-input-block">
        <input type="checkbox" name="status" lay-skin="switch" class="userInfo-status" checked=true>
      </div>
    </div>
    <div class="layui-form-item" style="display:none">
      <div class="layui-input-block">
        <input type="hidden" name="usrid" value="" class="usrid">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">权限</label>
      <div class="layui-input-block">
        <input type="radio" name="role" value="0" title="超级权限">
        <input type="radio" name="role" value="1" title="一般权限" checked=true>
      </div>
    </div>

    <div class="layui-form-item">
      <div class="layui-input-block">
        <button class="layui-btn" lay-submit  lay-filter="edit_user" id="edit_admin">立即提交</button>
        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
      </div>
    </div>

  </form>
</div>
<script>
  var index
  layui.use(['layer', 'form'], function () {
    $ = layui.jquery;
    layer = layui.layer;
    var form = layui.form;
    form.on('submit(add_user)', function (data) { //提交增加用户表单
      var userInfo = data.field;
      userInfo['status'] = userInfo['status'] == 'on' ? 0 : 1;
      $.post('/admin/admins/addAdmin', userInfo, function (res) {
        if(res.code == 1){
          layer.msg(res.msg);
        }else{
          layer.close(index);
         
          layer.msg(res.msg);
          setTimeout(function(){window.location.reload()},1000)

        }
      });
      return false;   //防止表单自动提交
    });

    form.on('submit(edit_user)', function (data) { //提交编辑用户表单
      var userInfo = data.field;
      userInfo['status'] = userInfo['status'] == 'on' ? 0 : 1;
      // alert(JSON.stringify(userInfo));
      $.post('/admin/admins/editAdmin',userInfo,function(res){
        if(res.code == 1){
          layer.msg(res.msg);
        }else{
          layer.close(index);
          layer.msg(res.msg);
          setTimeout(function(){window.location.reload()},1000)
          
        }
      });
    });
    return false;
  });

  function add_admins() {
    index = layer.open({
      title: '添加管理员',
      type: 1,
      area: ['600px', '600px'],
      content: $('#admin-panel-add') //这里content是一个DOM，注意：最好该元素要存放在body最外层，否则可能被其它的相对元素所影响
    });
  }

  function edit_admins(obj) {
    if ($($(obj).parent().prevAll()[2]).text() == '正常') {
      $('.userInfo-status').attr('checked', false);
      $('.userInfo-status').next().attr('class', 'layui-unselect layui-form-switch');

    } else {
      $('.userInfo-status').attr('checked', true);
      $('.userInfo-status').next().attr('class', 'layui-unselect layui-form-switch layui-form-onswitch');
    }
    index = layer.open({
      title: '编辑管理员',
      type: 1,
      area: ['600px', '600px'],
      content: $('#admin-panel-edit'), //这里content是一个DOM，注意：最好该元素要存放在body最外层，否则可能被其它的相对元素所影响
      success: function (layero, index) {
        var index = $(obj).parent().parent().attr('index');
        $('.usrid').attr('value', index);
      }
    });
  }
</script>

</html>