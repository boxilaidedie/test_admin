<?php /*a:1:{s:72:"D:\wwwroot\thinkphp.test\think\application\admin\view\admins\admins.html";i:1543829531;}*/ ?>
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
      <button class="layui-btn layui-btn-sm" type="botton" onclick="add_admins()">
        <i class="layui-icon">&#xe654;</i>
      </button>
      <button class="layui-btn layui-btn-sm">
        <i class="layui-icon">&#xe642;</i>
      </button>
      <button class="layui-btn layui-btn-sm">
        <i class="layui-icon">&#xe640;</i>
      </button>
      <button class="layui-btn layui-btn-sm">
        <i class="layui-icon">&#xe602;</i>
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
        <tr>
          <td>贤心</td>
          <td>2016-11-29</td>
          <td>人生就像是一场修行</td>
          <td>人生就像是一场修行</td>
        </tr>
        <tr>
          <td>许闲心</td>
          <td>2016-11-28</td>
          <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
          <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
        </tr>
        <tr>
          <td>许闲心</td>
          <td>2016-11-28</td>
          <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
          <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
        </tr>
      </tbody>
    </table>
  </div>

</body>
<div id="admin-panel" style="width:400px;display: none">
  <form class="layui-form" action="" style="margin-top:20px;">
    <div class="layui-form-item">
      <label class="layui-form-label">管理员账号</label>
      <div class="layui-input-block">
        <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
      </div> 
    </div>
    
    <div class="layui-form-item">
      <label class="layui-form-label">选择框</label>
      <div class="layui-input-block">
        <select name="city" lay-verify="required">
          <option value=""></option>
          <option value="0">北京</option>
          <option value="1">上海</option>
          <option value="2">广州</option>
          <option value="3">深圳</option>
          <option value="4">杭州</option>
        </select>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">权限</label>
      <div class="layui-input-block">
        <input type="checkbox" name="" title="写作" lay-skin="primary" checked>
        <input type="checkbox" name="" title="发呆" lay-skin="primary"> 
        <input type="checkbox" name="" title="禁用" lay-skin="primary" disabled> 
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">禁用</label>
      <div class="layui-input-block">
        <input type="checkbox" name="switch" lay-skin="switch">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">单选框</label>
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
      content: $('#admin-panel') //这里content是一个DOM，注意：最好该元素要存放在body最外层，否则可能被其它的相对元素所影响
    });
  }
</script>

</html>