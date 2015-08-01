<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css"/>
<!--<link rel="stylesheet" href="--><?php //echo base_url(); ?><!--public/vendor/bootstrap/css/bootstrap.css"/>-->
<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrapValidator.css"/>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrapValidator.js"></script>
<ol class="breadcrumb">
    <li><a>菜品管理</a></li>
    <li><a>菜品库</a></li>
    <li class="active">菜品详情</li>
</ol>

<div class="container">
    <div class="row">
        <!-- form: -->
        <section>
            <div class="col-lg-8 col-lg-offset-2">
                <div class="form-group" style="height:30px;">
                        <label for="name" class="col-xs-2 control-label">名称</label>
                        <div class="col-xs-2">
                            <input type="text" id="name" class="form-control" name="name" value="<?php echo $library->name;?>" readOnly="true"/>
                        </div>
                    </div>

                    <div class="form-group" style="height:110px;">
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
                           <img alt="暂无图片" style="width: 120px; height: 100px;" src="<?php echo $library->images;?>" >
   					
                        </div>
                    </div>
					
                    <div class="form-group" style="height:30px;">
                        <label class="col-xs-2 control-label">价格(元)</label>
                        <div class="col-xs-2">
                            <input type="text" class="form-control" name="price" value="<?php echo $library->price;?>" readOnly="true"/>
                        </div>
                    </div>

                    <div class="form-group" style="height:110px;">
                        <label class="col-xs-2 control-label">介绍</label>
                        <div class="col-xs-3">
                            <textarea class="form-control" rows="3" name="descript" readOnly="true"><?php echo $library->descript;?></textarea>
                        </div>
                    </div>
          </div>
        </section>
        <form class="navbar-form navbar-left" role="add">
        	<a href="../b_library/lupdate?id=<?php echo $library->id;?>" type="button" class="btn btn-info btn_add">修改菜品</a>
    	</form>
    </div>
</div>
