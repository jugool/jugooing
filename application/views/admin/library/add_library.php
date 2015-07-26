<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css"/>

<!--<link rel="stylesheet" href="--><?php //echo base_url(); ?><!--public/vendor/bootstrap/css/bootstrap.css"/>-->
<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrapValidator.css"/>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrapValidator.js"></script>
<ol class="breadcrumb">
    <li><a>菜品管理</a></li>
    <li><a>菜品库</a></li>
    <li class="active">添加菜品</li>
</ol>

<div class="container">
    <div class="row">
        <!-- form: -->
        <section>
            <div class="col-lg-8 col-lg-offset-2">
               <!--  <div class="page-header">
                    <h3>菜品添加</h3>
                </div> -->
                <form id="defaultForm" method="post" class="form-horizontal" action="ladd" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="name" class="col-xs-2 control-label">名称</label>
                        <div class="col-xs-2">
                            <input type="text" id="name" class="form-control" name="name"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-2 control-label">图片</label>
                        <div class="col-xs-4">
                            <!--  <input id="upfile" type="file" style="display:none">
                            <div class="input-group">
                                <input type="text" id="photoCover" name="upfile" class="form-control" placeholder="选择图片">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="$('input[id=upfile]').click();">选择图片</button>
                                </span>
                            </div>
                            -->
                            <input type='file' name='imgsrc' id="upfile">
                        </div>
                    </div>
					<!--  <div class="form-group" style="margin-left:17%;">
         				<img alt="120x180" class="img-rounded" data-src="holder.js/140x140" style="width: 180px; height: 120px;" src="<?php echo base_url();?>/public/upload/library/bbq.jpg" data-holder-rendered="true">
   					</div>-->
                    <div class="form-group">
                        <label class="col-xs-2 control-label">价格</label>
                        <div class="col-xs-2">
                            <input type="text" class="form-control" name="price"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-2 control-label">介绍</label>
                        <div class="col-xs-3">
                            <textarea class="form-control" rows="3" name="descript"></textarea>
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

        // 内容改变
        $("#upfile").change(function(){
            
			/* img_src = $("#upfile").val();
			alert(img_src);
            $(".img-rounded").attr("src", img_src);
            $("#defaultForm").submit();
            $("#uploadfile").change(function(){
            	 */
            	/*   alert(0);
            	 $('#defaultForm').attr('action','laddimg');
            	 alert(1);
            	 $('#defaultForm').ajaxSubmit(); 
            	 return false;  */
            	 /* $('#defaultForm').ajaxForm({  
            		 	type:"post",
            	        success: function(data)
            	        {
							alert(data);
                   	    }
            	    })  */
            }) 
           	/* jQuery.ajax({
           		type:"post",
           		url:"laddimg",
           		enctype:"multipart/form-data",
           		data:jQuery("#defaultForm"),
           		success: function(data) {
					alert(data);
               	} */
        
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
