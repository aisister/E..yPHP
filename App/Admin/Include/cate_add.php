



<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">新建分类</h2>
        </div>
    </header>


    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">创建新分类</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" id="cate_add" method="get" action="<?php echo $admin_url ?>Processing.php">
                                <input type="hidden" name="get" value="cate_add">
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">所属分类</label>
                                    <div class="col-sm-9">
                                        <select name="pid" class="form-control mb-3">
                                            <option value='0'>- 顶级分类 -</option>

                                <?php

                                     foreach($c_result as $row)
                                            {
                                                echo "<option value='".$row['id']."'>".$row['cate_name']."</option>";
                                                if(isset($row['sub'])){

                                                    foreach($row['sub'] as $k => $v){

                                                        echo "<option value='".$v['id']."'>　&nbsp;|--".$v['cate_name']."</option>";

                                                        if(isset($v['sub'])){
                                                            foreach($v['sub'] as $m => $n){

                                                                echo "<option value='".$n['id']."'>　　&nbsp;|--".$n['cate_name']."</option>";
                                                            }

                                                        }
                                                    }
                                                }
                                            }

                                            ?>

                                        </select>
                                    </div>

                                </div>

                                <div class="line"></div>

                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">分类名称</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="cate_name">
                                    </div>
                                </div>
                                <div class="line"></div>


                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">伪静态地址</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="cate_url" class="form-control">
                                    </div>
                                </div>



                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">关键词</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="cate_keyword" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">描述</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="cate_description" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">排序</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <input type="text"  name="sort" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="line"></div>


                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">外链</label>
                                    <div class="col-sm-9">
                                        <input type="test" name="cate_url" class="form-control">
                                    </div>
                                </div>


                                <div class="line"></div>

                                <div class="form-group row">
                                    <div class="col-sm-4 offset-sm-3">

                                        <button type="submit" name="cate_add" class="btn btn-primary" >创建</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>


<!--<!--    <script type="text/javascript">-->-->
<!--<!--        function cate_add() {-->-->
<!--<!--            $.ajax({-->-->
<!--<!--                type: "get",//方法类型-->-->
<!--<!--                dataType:"json",//预期服务器返回的数据类型-->-->
<!--<!--                url:"-->--><?php ////echo $admin_url ?><!--//Processing.php?ajax=cate_add" ,//url-->
<!--//                async:false,//同步-->
<!--//                cache:false,//不缓存-->
<!--//                data:$('#cate_add').serialize(),-->
<!--//                success:function (data) {-->
<!--//                    alert(data.msg)-->
<!--//                },-->
<!--//                error:function () {-->
<!--//                    alert("发生错误！");-->
<!--//                }-->
<!--//-->
<!--//            });-->
<!--//        }-->
<!--//    </script>-->