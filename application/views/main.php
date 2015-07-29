<?php $this->load->view('header');?>

<div class="content">
    <h2 class="m_3">午餐<small>（当前已点：极品肥牛干锅）</small></h2><!-- movie-test-light movie-test-right -->
        <div class="movie_top">
            <div class="col-md-9 movie_box">

                <!-- Dish list -->
                <?php foreach($dish_list as $key=>$item){?>
                <div class="movie movie-test <?php if($item['arrange'] === true) echo "movie-test-dark movie-test-left";else echo "movie-test-light movie-test-right";?>">
                    <div class="movie__images" id="dish_<?=$item['id']?>">
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
                    $(function() {
                        var num = 0;
                        $(".movie .movie__images").click(function(e) {
                            var num = $(this).next().find('input').val();
                            var name = $(this).next().find('a').html();
                            var id = $(this).attr('id');
                            id = id.split('dish_');
                            $(this).next().find('input').val(parseInt(num)+1);
                            var index_dish = $('#made_dish').html();
                            alert(id);
                            if(index_dish.indexOf(name)>0){

                            }else{
                                $('#made_dish').append("<b id=already_"+id+">"+name+"*1"+"</b>,");
                            }
                        });
                    });
                </script>
                <!-- Dish list end -->

                <div class="clearfix"></div>

                <div class="form-submit1 confirm-dish">
                    <p class="bg-primary">目前已点：<span id="made_dish"></span></p>
                    <input type="submit" value="确定点餐" id="submit" name="submit"><br>
                </div>

                <div class="clearfix"></div>

                <!-- Movie variant with time -->
            </div>
            <div class="col-md-3">
                <div class="movie_img">
                    <div class="grid_2">
                        <img src="<?php echo base_url();?>public/images/frontend/pic6.jpg" class="img-responsive" alt="">

                        <div class="caption1">
                            <ul class="list_5 list_7">
                                <li><i class="icon5"> </i>

                                    <p>3,548</p></li>
                            </ul>
                            <i class="icon4 icon6 icon7"> </i>

                            <p class="m_3">Guardians of the Galaxy</p>
                        </div>
                    </div>
                </div>
                <div class="grid_2 col_1">
                    <img src="<?php echo base_url();?>public/images/frontend/pic2.jpg" class="img-responsive" alt="">

                    <div class="caption1">
                        <ul class="list_3 list_7">
                            <li><i class="icon5"> </i>

                                <p>3,548</p></li>
                        </ul>
                        <i class="icon4 icon7"> </i>

                        <p class="m_3">Guardians of the Galaxy</p>
                    </div>
                </div>
                <div class="grid_2 col_1">
                    <img src="<?php echo base_url();?>public/images/frontend/pic9.jpg" class="img-responsive" alt="">

                    <div class="caption1">
                        <ul class="list_3 list_7">
                            <li><i class="icon5"> </i>

                                <p>3,548</p></li>
                        </ul>
                        <i class="icon4 icon7"> </i>

                        <p class="m_3">Guardians of the Galaxy</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
</div>

<?php $this->load->view('footer');?>