<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrapValidator.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrapValidator.js"></script>
<ol class="breadcrumb">
    <li><a href="#">菜品管理</a></li>
    <li><a href="#">菜品库</a></li>
    <li class="active">菜单添加</li>
</ol>

<div class="container">
    <div class="row">
        <!-- form: -->
        <section>
            <div class="col-lg-8 col-lg-offset-2">
                <div class="page-header">
                    <h3>菜单添加</h3>
                </div>
                <form id="defaultForm" method="post" class="form-horizontal" action="target.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="name" class="col-xs-2 control-label">上架菜品</label>
                        <div class="col-xs-6">
                            <div class="row">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="2">板栗烧鸡
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" value="4">回锅鱼
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="5">鱼香肉丝
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="8">土豆烧牛肉
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="11">鱼香肉丝
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="16">铁板鱿鱼
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="17">番茄炒蛋
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="8">土豆烧牛肉
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="11">鱼香肉丝
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="16">铁板鱿鱼
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="17">番茄炒蛋
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="8">土豆烧牛肉
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="11">鱼香肉丝
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="16">铁板鱿鱼
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="17">番茄炒蛋
                            </label>
                                </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-2 control-label">订餐时间段</label>
                        <div class="col-xs-2">
                            <select class="form-control" name="user_type">
                                <option value="am">中午</option>
                                <option value="pm">晚上</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-2 control-label">上架时间</label>
                        <div class="col-xs-2">
                            <select class="form-control" name="user_type">
                                <option value="1">今天</option>
                                <option value="2">明天</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-2"></div>
                        <div class="col-xs-6 col-lg-offset-3">
                            <button type="submit" class="btn btn-primary" name="signup" value="signup">添加</button>
                            </button>
                            <button type="button" class="btn btn-info" id="resetBtn">重置表单</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- :form -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $('input[id=upfile]').change(function() {
            $('#photoCover').val($(this).val());
        });
        $('#defaultForm').bootstrapValidator({

            message: '此值无效',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    message: '用户名无效',
                    validators: {
                        notEmpty: {
                            message: '菜品名称是必填项，且不能为空'
                        }
                    }
                },
                upfile: {
                    validators: {
                        notEmpty: {
                            message: '您未选择上传的菜品图片'
                        }
                    }
                },
                price: {
                    validators: {
                        notEmpty: {
                            message: '您未填写菜品价格'
                        },
                        numeric: {
                            message: '价格必须为数字'
                        }
                    }
                }
            }
        });
        //重置表单
        $('#resetBtn').click(function () {
            $('#defaultForm').data('bootstrapValidator').resetForm(true);
        });
    });
</script>
