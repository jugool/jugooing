<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.js"></script>

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
                        <label for="name" class="col-xs-2 control-label">已上架菜品</label>
                        <div class="col-xs-7">
                            <table class="table table-condensed">
                                <tbody>
                                <?php for($i=0;$i<ceil(count($dish_list)/4);$i++){ ?>
                                <tr>
                                    <?php for($j=0;$j<4;$j++){?>
                                        <?php if(!empty($dish_list[($i*4)+$j]->id)){?>
                                        <td>
                                            <input type="checkbox" value="<?=$dish_list[($i*4)+$j]->id?>" name="dish[]">&nbsp;<?=$dish_list[($i*4)+$j]->name?><br>
                                            <input type="text" name="num_<?=$dish_list[($i*4)+$j]->id?>" placeholder="数量" style="width:60%;"/>
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
                        <label class="col-xs-2 control-label">订餐时间段</label>
                        <div class="col-xs-2">
                            <select class="form-control" name="dish_time">
                                <option value="am">中午</option>
                                <option value="pm">晚上</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="shelves_time" class="col-xs-2 control-label">上架时间</label>
                        <div class="col-xs-2">
                            <input type="text" id="shelves_time" class="form-control" name="shelves_time"/>
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
