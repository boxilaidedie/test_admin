<?php /*a:1:{s:72:"D:\wwwroot\thinkphp.test\think\application\admin\view\admins\admins.html";i:1543831967;}*/ ?>
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
      <button class="layui-btn layui-btn-sm" type="button" onclick="edit_admins()">
        <i class="layui-icon">&#xe642;</i>
      </button>
      <button class="layui-btn layui-btn-sm">
        <i class="layui-icon">&#xe640;</i>
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
          <th>用户名</th>
          <th>权限</th>
          <th>真实姓名</th>
          <th>创建时间</th>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($userInfo) || $userInfo instanceof \think\Collection || $userInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $userInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
        <tr>
          <td><?php echo htmlentities($data['username']); ?></td>
          <td><?php echo htmlentities($data['gid']); ?></td>
          <td><?php echo htmlentities($data['truename']); ?></td>
          <td><?php echo htmlentities($data['add_time']); ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
  </div>

</body>
<div id="admin-panel-add" style="width:400px;display: none">
  <form class="layui-form" action="" style="margin-top:20px;">
    <div class="layui-form-item">
      <label class="layui-form-label">管理员账号</label>
      <div class="layui-input-block">
        <input type="text" name="title" required  lay-verify="required" placeholder="请输入管理员账号" autocomplete="off" class="layui-input">
      </div> 
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">管理员密码</label>
        <div class="layui-input-block">
          <input type="text" name="title" required  lay-verify="required" placeholder="请输入管理员密码" autocomplete="off" class="layui-input">
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
          <input type="text" name="title" required  lay-verify="required" placeholder="请输入管理员姓名" autocomplete="off" class="layui-input">
        </div> 
      </div>
    <div class="layui-form-item">
      <label class="layui-form-label">是否禁用</label>
      <div class="layui-input-block">
        <input type="checkbox" name="switch" lay-skin="switch">
      </div>
    </div>

    <div class="layui-form-item">
      <div class="layui-input-block">
        <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
      </div>
    </div>
  </form>
</div>


<div id="admin-panel-edit" style="width:400px;display: none">
    <form class="layui-form" action="" style="margin-top:20px;">
      <div class="layui-form-item">
        <label class="layui-form-label">管理员账号</label>
        <div class="layui-input-block">
          <input type="text" name="title" required  lay-verify="required" placeholder="请输入管理员账号" autocomplete="off" class="layui-input">
        </div> 
      </div>
      <div class="layui-form-item">
          <label class="layui-form-label">管理员姓名</label>
          <div class="layui-input-block">
            <input type="text" name="title" required  lay-verify="required" placeholder="请输入管理员账号" autocomplete="off" class="layui-input">
          </div> 
        </div>
      <div class="layui-form-item">
        <label class="layui-form-label">权限</label>
        <div class="layui-input-block">
          <input type="checkbox" name="" title="超级权限(1)" lay-skin="primary" checked>
          <input type="checkbox" name="" title="一般权限(0)" lay-skin="primary"> 
          <!-- <input type="checkbox" name="" title="禁用" lay-skin="primary" disabled>  -->
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">是否禁用</label>
        <div class="layui-input-block">
          <input type="checkbox" name="switch" lay-skin="switch">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">性别</label>
        <div class="layui-input-block">
          <input type="radio" name="sex" value="男" title="男">
          <input type="radio" name="sex" value="女" title="女" checked>
        </div>
      </div>
      <div class="layui-form-item">
        <div class="layui-input-block">
          <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
          <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
      </div>
    </form>
  </div>
<script>
  layui.use(['layer', 'form'], function () {
    $ = layui.jquery;
    layer = layui.layer;
    var form = layui.form;
    form.on('submit(formDemo)', function (data) {
      layer.msg(JSON.stringify(data.field));
      return false;
    });
  });

  function add_admins() {
    layer.open({
      title: '添加管理员',
      type: 1,
      area: ['600px', '600px'],
      content: $('#admin-panel-add') //这里content是一个DOM，注意：最好该元素要存放在body最外层，否则可能被其它的相对元素所影响
    });
  }

  function edit_admins(){
    layer.open({
      title: '管理员管理',
      type: 1,
      area: ['600px', '600px'],
      content: $('#admin-panel-edit') //这里content是一个DOM，注意：最好该元素要存放在body最外层，否则可能被其它的相对元素所影响
    });
  }
</script>

</html>