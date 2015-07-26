<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/admin.css" type="text/css" media="screen">
<!--<link rel="stylesheet" href="--><?php //echo base_url(); ?><!--public/vendor/bootstrap/css/bootstrap.css"/>-->
<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrapValidator.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrapValidator.js"></script>
<ol class="breadcrumb">
    <li><a href="#">用户管理</a></li>
    <li class="active">添加用户</li>
</ol>

<div class="container">
    <div class="row">
        <section>
            <div class="col-lg-8 col-lg-offset-2">
                <form id="defaultForm" method="post" class="form-horizontal" action="uadd">

                    <div class="form-group">
                        <label for="username" class="col-xs-2 control-label">名称</label>

                        <div class="col-xs-2">
                            <input type="text" id="username" class="form-control" name="username"/>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-xs-2 control-label">类型</label>

                        <div class="col-xs-3">
                            <select class="form-control" name="user_type">
                                <option value="1">员工</option>
                                <option value="0">管理员</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">工号</label>

                        <div class="col-xs-3">
                            <input type="job_number" class="form-control" name="job_number"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">密码</label>

                        <div class="col-xs-3">
                            <input type="password" class="form-control" name="password"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-2 control-label">重复密码</label>

                        <div class="col-xs-3">
                            <input type="password" class="form-control" name="confirmPassword"/>
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <label class="col-xs-2 control-label">手机</label>

                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="telephone"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-2 control-label">QQ</label>

                        <div class="col-xs-3">
                            <input type="text" class="form-control" name="qq"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">邮箱</label>

                        <div class="col-xs-3">
                            <input type="email" class="form-control" name="email"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-2 control-label" id="captchaOperation"></label>

                        <div class="col-xs-2">
                            <input type="text" class="form-control" name="captcha"/>
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
      </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        // 生成一个简单的验证码
        function randomNumber(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        };
        $('#captchaOperation').html([randomNumber(1, 50), '+', randomNumber(1, 50), '='].join(' '));

        $('#defaultForm').bootstrapValidator({

            message: '此值无效',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    message: '用户名无效',
                    validators: {
                        notEmpty: {
                            message: '用户名是必填项，且不能为空'
                        },
                        stringLength: {
                            min: 2,
                            max: 16,
                            message: '用户名的字符长度必须大于4，小于16'
                        }
//                        regexp: {
//                            regexp: /^[a-zA-Z0-9_\.]+$/,
//                            message: '用户名只能由字母、数字、点和下划线组成'
//                        },
//                        remote: { //同步查看是否存在用户
//                            url: 'is_users.php',
//						      type: post,
//							  data: function (validator) {
//                                return {
//                                     email: validator.getFieldElements('user_name').val()
//                                };
//                            },
//                            message: '当前用户名不可用'
//                        },
                    }
                },
                job_number: {
                	message: '工号无效',
                    validators: {
                    	 notEmpty: {
                             message: '工号为空'
                         },
                        digits: {
                            message: '工号必须为数字'
                        }
                       
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: '密码是必填项，且不能为空'
                        },
                        identical: {
                            field: 'confirmPassword',
                            message: '密码和重复密码不一致'
                        }
                    }
                },
                confirmPassword: {
                    validators: {
                        notEmpty: {
                            message: '重复密码是必填项，且不能为空'
                        },
                        identical: {
                            field: 'password',
                            message: '密码和重复密码不一致'
                        }
                    }
                },
                user_type: {
                    validators: {
                        notEmpty: {
                            message: '用户类型未选择'
                        }
                    }
                },
                telephone: {
                    validators: {
                        digits: {
                            message: '电话号码必须为数字'
                        }
                    }
                },
                email: {
                    validators: {
                        emailAddress: {
                            message: '您输入的不是有效电子邮箱地址'
                        }
                    }
                },
                qq: {
                    validators: {
                        stringLength: {
                            min: 5,
                            max: 11,
                            message: 'QQ号码的字符长度必须大于5，小于11'
                        },
                        digits: {
                            message: 'QQ号码必须为数字'
                        }
                    }
                },
                captcha: {
                    validators: {
                        callback: {
                            message: '回答错误',
                            callback: function (value, validator) {
                                var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                                return value == sum;
                            }
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

