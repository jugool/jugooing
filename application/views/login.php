<?php $this->load->view('header');?>

    <div class="content">

        <div class="col-md-6 login-right login">
            <!--<h2>登&nbsp;录</h2>  -->

            <p>请用您的工号进行登录，如有问题，请联系管理员。</p>

            <?php echo form_open('./index/do_login');?>
                <div>
                    <span><label>*</label>工号</span>
                    <?php
<<<<<<< Upstream, based on branch 'master' of https://github.com/jugool/jugooing.git
                    echo form_input('job_number', set_value('job_number'), 'id="job_number" class="form-control" placeholder="Job_number" autocomplete="off"');
=======
                    echo form_input('number', set_value('number'), 'id="number" class="form-control" placeholder="number" autocomplete="off"');
>>>>>>> ab954f3 解决冲突
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
            <input type='hidden' name='jugool' value='<?php echo $jugool;?>'>
                <!--<a class="forgot" href="#">Forgot Your Password?</a>-->
            <?php echo form_submit('submit','登陆','class="btn btn-primary btn-login"');?>
            <?php echo form_close();?>
            
        </div>
        <div class="clearfix"></div>
    </div>

<?php $this->load->view('footer');?>
