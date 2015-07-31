<?php $this->load->view('header');?>

<script type="text/javascript">
$(function(){
    $(".content .m_3 a").click(function(){
        if(confirm("你确定要取消订单吗？")){
            var mydate = new Date();
            var date1 = mydate.toLocaleDateString(); //当前日期
            var date2 = $(".content .m_3").attr("name"); //获取当前时间段
            $.ajax({
                type: "POST",
                url: "cancel_order",
                data: {date1:date1,date2:date2},
                dataType: "json",
                success: function(data){
                    if(data == true){
                        window.alert('你已经成功取消当前订餐');
                        location.reload();
                    }else if(data == false){
                        window.alert('取消失败');
                        location.reload();
                    }
                }
            });
        }else{
            return false;
        }
    })
})
</script>
<div class="content">
    <h2 class="m_3" name="<?php if(!empty($this_date)) echo $this_date;?>">午餐
        <small>
            （当前已点：
            <?php
                if(!empty($this_people)){
                    echo $this_people;
                    echo ')<a href="javascript:;">&nbsp;&nbsp;取消</a>';
                } else
                    echo "当前暂未点餐)";
            ?>
        </small>
    </h2><!-- movie-test-light movie-test-right -->
        <div class="movie_top">
            <div class="col-md-9 movie_box">

                <!-- Dish list -->
                <?php foreach($dish_list as $key=>$item){?>
                <div class="movie movie-test <?php if($item['arrange'] === true) echo "movie-test-dark movie-test-left";else echo "movie-test-light movie-test-right";?>">
                    <div class="movie__images" id="library_<?=$item['l_id']?>">
                        <a href="javascript:;" class="movie-beta__link" >
                            <img alt="当前无图片" src="<?php echo $item['images'];?>" class="img-responsive" />
                        </a>
                    </div>
                    <div class="movie__info">
                        <a href="javascript:;" class="movie__title"><?php echo $item['name'];?></a>
                        <p class="movie__time">单价：<span><?php echo $item['price'];?>元</span></p>
                        <p class="movie__option">简介：<?php echo $item['descript'];?></p>
                        <div class="input-group col-xs-8 dish_num">
                            <span class="input-group-addon">数量:</span>
                            <input type="text" class="form-control input-sm" value="0">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php }?>
                <script type="text/javascript">
                    $(function () {
                        var num = 0;
                        /* 实时获取到员工点击菜品次数，并添加到下面的已点菜品列中 */
                        $(".movie .movie__images").click(function (e) {
                            var num = $(this).next().find('input').val(); //获取选取菜品数量
                            var name = $(this).next().find('a').html(); //获取当前点击菜品名称
                            var id = $(this).attr('id'); //获取菜品ID
                            id = id.split('_'); //获取当前菜品ID
                            var number = parseInt(num) + 1;
                            $(this).next().find('input').val(number);
                            var index_dish = $('#made_dish').html();
                            if (index_dish.indexOf(name) > 0) {//实时对点击的菜品增加数量
                                $('#already_' + id[1]).html(name + "*" + number);
                            } else {
                                $('#made_dish').append("<b id=already_" + id[1] + ">" + name + "*1" + "</b>,");
                            }
                        });
                        /* 员工在当前菜品输入框中输入菜品数量，实时修改已点菜单列表数据 */
                        $(".dish_num input").keyup(function(e){
                            var this_num = $(this).val(); //获取输入框菜品数量
                            var id = $(this).parent().parent().prev().attr('id');
                            var name = $(this).parent().parent().find('a').html();
                            id = id.split('_'); //获取当前菜品ID
                            var index_dish = $('#made_dish').html();
                            if (index_dish.indexOf(name) > 0) {//实时对点击的菜品增加数量
                                $('#already_' + id[1]).html(name + "*" + this_num);
                            } else {
                                $('#made_dish').append("<b id=already_" + id[1] + ">" + name + "*" + this_num + "</b>,");
                            }
                        })
                    });
                </script>
                <!-- Dish list end -->

                <div class="clearfix"></div>
                <div class="form-submit1 confirm-dish">
                    <p class="bg-info">目前已点：<span id="made_dish"></span></p>
                    <input type="submit" value="确定点餐" id="submit" name="submit"><br>
                </div>
                <script type="text/javascript">
                    $(function(){
                        $("#submit").click(function(){
                            if(confirm("你已经确定要提交订单了吗？")){
                                var order = $("#made_dish").html();
                                var mydate = new Date();
                                var date1 = mydate.toLocaleDateString(); //当前日期
                                var date2 = $(".content .m_3").attr("name"); //获取当前时间段
                                if(order.length>0){
                                    $.ajax({
                                        type: "POST",
                                        url: "order_process",
                                        data: {order_list:order,date1:date1,date2:date2},
                                        dataType: "json",
                                        success: function(data){
                                            if (data == 2) {
                                                window.alert('当前时间你已订餐，如需修改，请取消当前订餐');
                                                location.reload();
                                            } else if (data == true) {
                                                window.alert('你已经成功订餐');
                                                location.reload();
                                            } else {
                                                window.alert('订餐失败了');
                                                location.reload();
                                            }
                                        }
                                    });
                                }else{
                                    window.alert("你还没有选择菜品呢！");
                                    return false;
                                }
                            }else{
                                return false;
                            }
                        });
                    })
                </script>
                <div class="clearfix"></div>

                <!-- Movie variant with time -->
            </div>
            <div class="col-md-3">
                <div class="movie_img">
                    <div class="alert alert-info" role="alert">
                        <h4>今日公告</h4>
                        <p><?php echo $notice['content'];?></p>
                        <p class="text-right"><?php echo $notice['create_time'];?></p>
                    </div>
                </div>
                <?php foreach($order as $item){ ?>
                <div class="grid_2 col_1">
                    <img src="<?php echo $item['images'];?>" class="img-responsive" alt="">
                    <div class="caption1">
                        <ul class="list_3 list_7">
                            <li><i class="icon5"> </i>
                                <p><?php echo $item['count'];?></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php }?>
            </div>
            <div class="clearfix"></div>
        </div>
</div>

<?php $this->load->view('footer');?>