<?php
define('IS_MyPHP', TRUE);

//定义根目录
define('ROOT_PATH',dirname(__FILE__));
//加载配置
require_once (ROOT_PATH.'/Admin_config.php');


    //调出分类数据
    $cate_db = $_DB->select("category", [
        "id",
        "pid",
        "sort"
    ]);
    //对分类进行多维排序
    $c_result=ClassTree::hTree($cate_db);
    $c_r_e = array_values($c_result);

    foreach ($c_r_e as $v){
        $_Ywshuzu_ = $v['id'];
        $_Ywshuzu_SUB = $v['sub'];
        if(isset($v['sub'])){
            foreach ($v['sub'] as $m){
                $_Ewshuzu_ = $m['id'];
                $_Ewshuzu_SUB = $m['sub'];
                    if(isset($m['sub'])){
                        foreach ($m['sub'] as $n){
                            $_Swshuzu_ = $n['id'];
                            $_Swshuzu_PID = $n['pid'];
                        }
                    }
            }
        }
    }



    //新增分类
    if(isset($_POST['cate_add'])){
        //如果分类关联PID大于3 就不能创建
        if(@$_Swshuzu_PID >= 3){
            echo '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style>
<div style="padding: 24px 48px;"> <h1>:(</h1><p>目前只支持创建三级分类！ </p></div>';
            echo '<script> setTimeout("history.back()", 2000); </script>';
            exit;

        }


         $_DB->insert("category", [
             "pid" => intval($_POST['pid']),
             "cate_name" =>Getpost::filterWords($_POST['cate_name']),
             "cate_keyword" => Getpost::filterWords($_POST['cate_keyword']),
             "cate_description" => Getpost::filterWords($_POST['cate_description']),
             "cate_hide" => intval($_GET['cate_hide']),
             "cate_url" => $_POST['cate_url'],
             "sort" => intval($_POST['sort'])
         ]);
         echo "<script>window.location.href='$App_URL_Include./Category.php'</script>";
         exit;
     };

    //编辑更新分类
    if(isset($_GET['cate_update']) == 'cate_update'){
        $_DB->update("category", [
            "pid" => intval($_GET['pid']),
            "cate_name" =>Getpost::filterWords($_GET['cate_name']),
            "cate_keyword" => Getpost::filterWords($_GET['cate_keyword']),
            "cate_description" => Getpost::filterWords($_GET['cate_description']),
            "cate_url" => $_GET['cate_url'],
            "cate_hide" => intval($_GET['cate_hide']),
            "sort" => intval($_GET['sort'])
        ],[
            "id" => intval($_GET['id']),
        ]);
        echo "<script>window.location.href='$App_URL_Include./Category.php'</script>";
        exit;
    };

    //删除分类
    if(isset($_GET['dele_cate'])){


        //删除判断
        if($_Ywshuzu_ == $_GET['dele_cate']){
            if(!empty($_Ywshuzu_SUB)){
                echo '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style>
<div style="padding: 24px 48px;"> <h1>:(</h1><p>请先删除二级分类！ </p></div>';
                echo '<script> setTimeout("history.back()", 1000); </script>';
                exit;
            }
        }
        if(@$_Ewshuzu_ == $_GET['dele_cate']){
            if(!empty($_Ewshuzu_SUB)){
                echo '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style>
<div style="padding: 24px 48px;"> <h1>:(</h1><p>请先删除三级分类！ </p></div>';
                echo '<script> setTimeout("history.back()", 1000); </script>';
                exit;
            }
        }

        $_DB->delete("category",[
            "id" => intval($_GET['dele_cate']),
        ]);

        echo "<script>window.location.href='$App_URL_Include./Category.php'</script>";
        exit;
    };


    //删除内容
    if(isset($_GET['dele_content'])){

        $_DB->delete("content",[
            "id" => intval($_GET['dele_content']),
        ]);
        echo "<script>window.location.href='$App_URL_Include./Content.php'</script>";
        exit;
    };

    //删除留言
    if(isset($_GET['dele_message'])){

        $_DB->delete("message",[
            "id" => intval($_GET['dele_message']),
        ]);
        echo "<script>window.location.href='$App_URL_Include./Message.php'</script>";
        exit;
    };

    //通过审核
    if(isset($_GET['audit_message'])){

        $_DB->update("message",[
            "u_audit" =>1
        ],[
            "id" => intval($_GET['audit_message']),
        ]);
        echo "<script>window.location.href='$App_URL_Include./Message.php'</script>";
        exit;
    };







    //编辑用户
    if(isset($_GET['user_update']) == 'user_update'){
        $_DB->update("user", [
            "username" =>Getpost::filterWords($_GET['username']),
            "nickname" => Getpost::filterWords($_GET['nickname']),
            "password" => md5($_GET['password']),
            "email" => Getpost::filterWords($_GET['email']),
            "thumbnail" => Getpost::filterWords($_GET['thumbnail']),
            "level" => intval($_GET['level'])
        ],[
            "id" => intval($_GET['id']),
        ]);
        echo "<script>window.location.href='$App_URL_Include./User.php'</script>";
        exit;
    };





    //回复留言
    if(isset($_GET['Message_edit']) == 'Message_edit'){

        $_DB->update("message", [
            "reply" =>Getpost::filterWords($_GET['reply']),
            "reply_time" => intval($_GET['reply_time']),

        ],[
            "id" => intval($_GET['Message_id']),
        ]);
        echo "<script>window.location.href='$App_URL_Include./Message.php'</script>";
        exit;
    };







    //更新基本设置
    if(isset($_POST['web_post']) == 'web_post'){
        $_DB->update("basic", [
            "web_title" => Getpost::filterWords($_POST['web_title']),
            "web_email" =>Getpost::filterWords($_POST['web_email']),
            "web_copyright" => htmlentities($_POST['web_copyright'])
        ],[
            "id" => 1,
        ]);
        echo "<script>window.location.href='$App_URL_Include./Configure.php'</script>";
        exit;
    };

    //更新关键词
    if(isset($_POST['seo_post']) == 'seo_post'){
        $_DB->update("basic", [
            "seo_keyword" => Getpost::filterWords($_POST['seo_keyword']),
            "seo_description" =>Getpost::filterWords($_POST['seo_description']),
            "seo_count" => htmlentities($_POST['seo_count'])
        ],[
            "id" => 1,
        ]);
        echo "<script>window.location.href='$App_URL_Include./Configure.php'</script>";
        exit;
    };

    //更新设置
    if(isset($_POST['basic_post']) == 'basic_post'){
        $_DB->update("basic", [
            "basic_num" => intval($_POST['basic_num']),
            "basic_image" =>htmlentities($_POST['basic_image']),
        ],[
            "id" => 1,
        ]);
        echo "<script>window.location.href='$App_URL_Include./Configure.php'</script>";
        exit;
    };



// 新增碎片



if(isset($_POST['fragment_add']) == 'fragment_add'){

    $_DB->insert("fragment", [
        "title" => Getpost::filterWords($_POST['f_title']),
        "tag" => Getpost::filterWords($_POST['f_tag']),
        "text" => htmlentities($_POST['f_text']),
    ]);
    echo "<script>window.location.href='$App_URL_Include./Fragment.php'</script>";
    exit;
};


// 新增碎片 编辑
if(isset($_POST['fragment_edit']) == 'fragment_edit'){

    $_DB->update("fragment", [
        "title" => Getpost::filterWords($_POST['f_title']),
        "tag" => Getpost::filterWords($_POST['f_tag']),
        "text" => htmlentities($_POST['f_text']),
    ],[
        "id" => intval($_POST['f_id'])
    ]);
    echo "<script>window.location.href='$App_URL_Include./Fragment.php'</script>";
    exit;
};

// 新增碎片 删除
if(isset($_GET['dele_fragment'])){

    $_DB->delete("fragment",[
        "id" => intval($_GET['dele_fragment']),
    ]);

    echo "<script>window.location.href='$App_URL_Include./Fragment.php'</script>";
    exit;
};


    //撰写内容-发布
    if(isset($_POST['content_add']) == 'content_add'){

        $_DB->insert("content", [
            "content_pid" => intval($_POST['content_pid']),
            "content_title" =>Getpost::filterWords($_POST['content_title']),
            "content_keyword" => Getpost::filterWords($_POST['content_keyword']),
            "content_description" => Getpost::filterWords($_POST['content_description']),
            "content_thumbnail" => Getpost::filterWords($_POST['content_thumbnail']),
            "content_time" => intval($_POST['content_time']),
            "content_url" => Getpost::filterWords($_POST['content_url']),
            "content_text" => htmlentities($_POST['content_text']),
            "content_draft" => 0
        ]);
        echo "<script>window.location.href='$App_URL_Include./Content_add.php'</script>";
        exit;
    };


    //撰写内容-保存
    if(isset($_POST['content_draft']) == 'content_draft'){

        if($_POST['content_pid'] == 0){
            echo '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style>
<div style="padding: 24px 48px;"> <h1>:(</h1><p>您还没有选择分类！ </p></div>';
            echo '<script> setTimeout("history.back()", 1000); </script>';
            exit();
        }

        $_DB->insert("content", [
            "content_pid" => intval($_POST['content_pid']),
            "content_title" =>Getpost::filterWords($_POST['content_title']),
            "content_keyword" => Getpost::filterWords($_POST['content_keyword']),
            "content_description" => Getpost::filterWords($_POST['content_description']),
            "content_thumbnail" => Getpost::filterWords($_POST['content_thumbnail']),
            "content_time" => intval($_POST['content_time']),
            "content_url" => Getpost::filterWords($_POST['content_url']),
            "content_text" => htmlentities($_POST['content_text']),
            "content_draft" => 1
        ]);
        echo "<script>window.location.href='$App_URL_Include./Content_add.php'</script>";
        exit;
    };


    //撰写内容-编辑
    if(isset($_GET['content_update']) == 'content_update'){
        $_DB->update("content", [
            "content_pid" => intval($_GET['content_pid']),
            "content_title" =>Getpost::filterWords($_GET['content_title']),
            "content_keyword" => Getpost::filterWords($_GET['content_keyword']),
            "content_description" => Getpost::filterWords($_GET['content_description']),
            "content_thumbnail" => Getpost::filterWords($_GET['content_thumbnail']),
            "content_time" => intval($_GET['content_time']),
            "content_text" => htmlentities($_GET['content_text']),
            "content_url" => Getpost::filterWords($_GET['content_url']),
            "content_draft" => intval($_GET['content_draft'])
        ],[
            "id" => intval($_GET['id']),
        ]);
        echo '<script> setTimeout("history.back()", 1000); </script>';
        exit;
    };






    //更新缓存
    if(isset($_GET['dele']) == 'del_cache'){

        $cache = dirname(dirname(dirname(__FILE__)))."/Cache/";
        $cache_file = new File();
        $cache_file -> removedir($cache);

        echo '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style>
<div style="padding: 24px 48px;"> <h1>:)</h1><p>更新缓存成功！ </p></div>';
        echo '<script> setTimeout("history.back()", 1000); </script>';

    }



