<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo base_url();?>public/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>public/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>
<body>
<ol class="breadcrumb">
    <li><a>系统管理</a></li>
    <li><a>系统公告</a></li>
</ol>

<div class="container">
    <div class="row">
        <section>
            <div class="col-lg-8 col-lg-offset-2">
                <form id="defaultForm" method="post" class="form-horizontal" action="nnotice" enctype="multipart/form-data">
					<div class="form-group">
                        <label class="col-xs-2 control-label">内容</label>
                        <div class="col-xs-3">
                            <textarea class="form-control" rows="5" cols="20" name="notice"><?php echo $notice->content;?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-2"></div>
                        <div class="col-xs-6 col-lg-offset-3">
                            <button type="submit" class="btn btn-primary">修改</button>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
