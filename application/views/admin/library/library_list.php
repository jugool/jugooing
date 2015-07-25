<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/admin.css" type="text/css" media="screen">
<ol class="breadcrumb">
    <li><a href="#">菜品管理</a></li>
    <li class="active">菜品库</li>
</ol>

<div class="table_list">
    <form class="navbar-form navbar-left" role="add">
        <a href="add_dishs" type="button" class="btn btn-info btn_add">添加菜品</a>
    </form>
    <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">查询</button>
    </form>
</div>

<table class="table table-striped table-bordered table-hover table-condensed">
    <tr>
        <th>ID</th>
        <th>菜名</th>
        <th>图片</th>
        <th>价格</th>
        <th>创建时间</th>
        <th>操作</th>
    </tr>
    <tr>
        <td>1</td>
        <td>回锅肉</td>
        <td>
            <img alt="120x180" class="img-rounded" data-src="holder.js/140x140" style="width: 180px; height: 120px;" src="<?php echo base_url();?>/public/upload/library/bbq.jpg" data-holder-rendered="true">
        </td>
        <td>18.5元</td>
        <td>2014/10/23</td>
        <td>
            <a href="javascript:;">修改</a> |
            <a href="javascript:;">删除</a>
        </td>
    </tr>
    <tr>
        <td>1</td>
        <td>回锅肉</td>
        <td>
            <img alt="120x180" class="img-rounded" data-src="holder.js/140x140" style="width: 180px; height: 120px;" src="<?php echo base_url();?>/public/upload/library/bbq.jpg" data-holder-rendered="true">
        </td>
        <td>18.5元</td>
        <td>2014/10/23</td>
        <td>
            <a href="javascript:;">修改</a> |
            <a href="javascript:;">删除</a>
        </td>
    </tr>
    <tr>
        <td>1</td>
        <td>回锅肉</td>
        <td>
            <img alt="120x180" class="img-rounded" data-src="holder.js/140x140" style="width: 180px; height: 120px;" src="<?php echo base_url();?>/public/upload/library/bbq.jpg" data-holder-rendered="true">
        </td>
        <td>18.5元</td>
        <td>2014/10/23</td>
        <td>
            <a href="javascript:;">修改</a> |
            <a href="javascript:;">删除</a>
        </td>
    </tr>
    <tr>
        <td>1</td>
        <td>回锅肉</td>
        <td>
            <img alt="120x180" class="img-rounded" data-src="holder.js/140x140" style="width: 180px; height: 120px;" src="<?php echo base_url();?>/public/upload/library/bbq.jpg" data-holder-rendered="true">
        </td>
        <td>18.5元</td>
        <td>2014/10/23</td>
        <td>
            <a href="javascript:;">修改</a> |
            <a href="javascript:;">删除</a>
        </td>
    </tr>
    <tr>
        <td>1</td>
        <td>回锅肉</td>
        <td>
            <img alt="120x180" class="img-rounded" data-src="holder.js/140x140" style="width: 180px; height: 120px;" src="<?php echo base_url();?>/public/upload/library/bbq.jpg" data-holder-rendered="true">
        </td>
        <td>18.5元</td>
        <td>2014/10/23</td>
        <td>
            <a href="javascript:;">修改</a> |
            <a href="javascript:;">删除</a>
        </td>
    </tr>
</table>
<nav>
    <ul class="pagination">
        <li><a href="javascript:;">总页数：27</a></li>
        <li class="disabled"><a aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
    </ul>
</nav>
