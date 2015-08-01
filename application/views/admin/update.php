<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/admin.css" type="text/css" media="screen">
<!--<link rel="stylesheet" href="--><?php //echo base_url(); ?><!--public/vendor/bootstrap/css/bootstrap.css"/>-->
<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrapValidator.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrapValidator.js"></script>
<ol class="breadcrumb">
    <li><a>修改密码</a></li>
</ol>

<div class="container">
    <div class="row">
        <section>
            <div class="col-lg-8 col-lg-offset-2">
                <form id="defaultForm" method="post" class="form-horizontal" action="update">
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
                        <div class="col-xs-2"></div>
                        <div class="col-xs-6 col-lg-offset-3">
                            <button type="submit" class="btn btn-primary" name="signup" value="signup">添加</button>
                            </button>
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
                }    
            }
        });
    });
</script>