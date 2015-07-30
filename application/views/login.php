<?php $this->load->view('header');?>

    <div class="content">

        <div class="col-md-6 login-right login">
            <h2>登&nbsp;录</h2>

            <p>请用您的工号进行登录，如果忘记了，可以联系管理员找回。</p>

            <?php echo form_open('login/index');?>
                <div>
                    <span><label>*</label>工号</span>
                    <?php
                    echo form_input('job_number', set_value('job_number'), 'id="job_number" class="form-control" placeholder="Job_number" autocomplete="off"');
                    ?>
                </div>
                <?php echo form_error('job_number');?>
                <div>
                    <span><label>*</label>密码</span>
                    <?php
                    echo form_password('password', set_value('password'), 'id="password" class="form-control" placeholder="Password" autocomplete="off"');
                    ?>
                </div>
            <?php echo form_error('password');?>
                <!--<a class="forgot" href="#">Forgot Your Password?</a>-->
            <?php echo form_submit('submit','登陆','class="btn btn-primary btn-login"');?>
            </from>
        </div>
        <div class="clearfix"></div>
    </div>

<?php $this->load->view('footer');?>