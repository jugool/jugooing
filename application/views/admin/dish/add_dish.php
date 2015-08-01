<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo base_url();?>public/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>public/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>
<body>
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
                <form id="defaultForm" method="post" class="form-horizontal" action="dadd">

                    <div class="form-group">
                        <label for="shelves_time" class="col-xs-2 control-label">订餐时间</label>
                        <div style="padding-left:15px;" class="input-group date form_date col-xs-3" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="16" type="text" name="shelves_time" value="" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-xs-2 control-label">订餐时段</label>
                        <div class="col-xs-2">
                            <select class="form-control" name="dish_time">
                                <option value="am">中午</option>
                                <option value="pm">晚上</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="name" class="col-xs-2 control-label">添加菜品</label>
                        <div class="col-xs-7">
                            <table class="table table-condensed">
                                <tbody>
                                <?php for($i=0;$i<ceil(count($dish_list)/4);$i++){ ?>
                                    <tr>
                                        <?php for($j=0;$j<4;$j++){?>
                                            <?php if(!empty($dish_list[($i*4)+$j]->id)){?>
                                                <td>
                                                    <input type="checkbox" value="<?php echo $dish_list[($i*4)+$j]->id?>" name="dish[]">&nbsp;<?php echo $dish_list[($i*4)+$j]->name?><br>
                                                    <input type="text" name="num_<?php echo $dish_list[($i*4)+$j]->id?>" placeholder="数量" style="width:60%;" onkeyup="checkNum(this)"/>
                                                </td>
                                            <?php }?>
                                        <?php }?>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="types" />
                    </div>

                    <div class="form-group">
                        <div class="col-xs-2"></div>
                        <div class="col-xs-6 col-lg-offset-3">
                            <button type="submit" class="btn btn-primary" name="signup" value="signup">添加</button></button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- :form -->
    </div>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript">

    $('.form_date').datetimepicker({
        language:  'zh_cn',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });

    /* 控制输入只能是数字，且只能是一位小数 */
    function checkNum(obj) {
        //检查是否是非数字值
        if (isNaN(obj.value)) {
            obj.value = "";
        }
        if (obj != null) {
            //检查数量合法性
            if (obj.value.toString().split(".").length > 0 && obj.value.toString().split(".")[1].length > 0) {
                alert("数量不能是小数");
                obj.value = "";
            }
        }
    }

</script>
</html>