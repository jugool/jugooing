<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/add.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css" type="text/css" media="screen">
<div class="div_from_aoto" style="width: 500px;">
    <form>
        <div class="control-group">
            <label class="laber_from">用户名</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入用户名" type="text"><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">密码</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入密码" type="text"><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">确认密码</label>
            <div class="controls"><input class="input_from" placeholder=" 请输入确认密码" type="text"><p class="help-block"></p></div>
        </div>
        <div class="control-group">
            <label class="laber_from">角色</label>
            <div class="controls">
                <select class="input_select">
                    <option selected="selected">管理员</option>
                    <option>普通用户</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="laber_from"></label>
            <div class="controls"><button class="btn btn-success" style="width:120px;">确认</button></div>
        </div>
    </form>
</div>