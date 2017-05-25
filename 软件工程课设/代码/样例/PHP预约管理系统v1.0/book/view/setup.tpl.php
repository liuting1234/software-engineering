<? if(!defined('RAIN') || !defined('RAIN_USER')) header("Location:index.php?m=user");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=API_VIEW?>css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=API_VIEW?>js/jquery-1.6.1.min.js"></script>
<script>
$(document).ready(function(){
	$(".setup-bar-nav").each(function(i){
		$($(".setup-box")[0]).show();
		$($(".setup-bar-nav")[0]).css({"background":"#FFF","color":"#000","border-bottom":"#FFF 1px solid"});
        $(this).click(function(){
			$(".setup-bar-nav").css({"background":"#000","color":"#FFF","border-bottom":"#DDD 1px solid"});
			$($(".setup-bar-nav")[i]).css({"background":"#FFF","color":"#000","border-bottom":"#FFF 1px solid"});
			$(".setup-box").hide();
			$($(".setup-box")[i]).show();
		})
	});
});
</script>
<title>setup</title>
</head>

<body>
<div class="title"><span>系统设置</span><a href="javascript:history.go(-1);">返回</a></div>
<div class="setup">
    <div class="setup-bar">
        <div class="setup-bar-nav">内容管理</div><div class="setup-bar-nav">用户管理</div>
    </div>
    <div class="setup-box">
        <div class="setup-box-b">
        <div class="class">
            <div class="class-bar"><div class="class-bar-id">ID</div><div class="class-bar-title">名称</div><div class="class-bar-de">操作</div></div>
            <?php if(isset($source) and is_array($source)){ foreach($source as $k=>$v) {?> 
            <div class="class-lan">
                <div class="class-lan-id"><?=$v['id']?></div><div class="class-lan-title"><?=$v['title']?></div>
                <div class="class-lan-de"><a href="?m=setup&a=delclass&id=<?=$v['id']?>">删除</a></div>
            </div>
             <?php } } ?>
        </div>
        <form class="add-s" method="post" action="index.php?m=setup&a=addclass&typename=source">
            <span>媒体来源</span><input type="text" name="title" /><input id="add-s-submit" type="submit" value="添加" />
        </form>
        </div>
        <div class="setup-box-b">
        <div class="class">
            <div class="class-bar"><div class="class-bar-id">ID</div><div class="class-bar-title">名称</div><div class="class-bar-de">操作</div></div>
            <?php if(isset($website) and is_array($website)){ foreach($website as $k=>$v) {?> 
            <div class="class-lan">
                <div class="class-lan-id"><?=$v['id']?></div><div class="class-lan-title"><?=$v['title']?></div>
                <div class="class-lan-de"><a href="?m=setup&a=delclass&id=<?=$v['id']?>">删除</a></div>
            </div>
             <?php } } ?>
        </div>
        <form class="add-s" method="post" action="index.php?m=setup&a=addclass&typename=website">
            <span>网站来源</span><input type="text" name="title" /><input id="add-s-submit" type="submit" value="添加" />
        </form>
        </div>
        <div class="setup-box-b">
        <div class="class">
            <div class="class-bar"><div class="class-bar-id">ID</div><div class="class-bar-title">名称</div><div class="class-bar-de">操作</div></div>
            <?php if(isset($illness) and is_array($illness)){ foreach($illness as $k=>$v) {?>  
            <div class="class-lan">
                <div class="class-lan-id"><?=$v['id']?></div><div class="class-lan-title"><?=$v['title']?></div>
                <div class="class-lan-de"><a href="?m=setup&a=delclass&id=<?=$v['id']?>">删除</a></div>
            </div>
             <?php } } ?>
        </div>
        <form class="add-s" method="post" action="index.php?m=setup&a=addclass&typename=illness">
            <span>病种分类</span><input type="text" name="title" /><input id="add-s-submit" type="submit" value="添加" />
        </form>
        </div>
        <div class="setup-box-b">
        <div class="class">
            <div class="class-bar"><div class="class-bar-id">ID</div><div class="class-bar-title">名称</div><div class="class-bar-de">操作</div></div>
            <?php if(isset($doctor) and is_array($doctor)){ foreach($doctor as $k=>$v) {?> 
            <div class="class-lan">
                <div class="class-lan-id"><?=$v['id']?></div><div class="class-lan-title"><?=$v['title']?></div>
                <div class="class-lan-de"><a href="?m=setup&a=delclass&id=<?=$v['id']?>">删除</a></div>
            </div>
             <?php } } ?>
        </div>
        <form class="add-s" method="post" action="index.php?m=setup&a=addclass&typename=doctor">
            <span>预约医生</span><input type="text" name="title" /><input id="add-s-submit" type="submit" value="添加" />
        </form>
        </div>
    </div>
    <div class="setup-box">
        <div class="user">
            <div class="user-bar">
                <div class="user-bar-id">ID</div><div class="user-bar-name">姓名</div><div class="user-bar-name">用户名</div><div class="user-bar-right">权限</div>
                <div class="user-bar-opreate">管理项</div>
            </div>
            <?php if(isset($id5) and is_array($id5)){ foreach($id5 as $k=>$v) {?> 
            <div class="user-lan">
                <div class="user-lan-id"><?=$id5[$k]?></div><div class="user-lan-name"><?=$name5[$k]?></div><div class="user-lan-name"><?=$user5[$k]?></div>
                <div class="user-lan-right"><?=show_right($u_right5[$k])?></div>
                <div class="user-lan-opreate"><a href="index.php?m=setup&a=edituser&id=<?=$id5[$k]?>">更改</a><a href="index.php?m=setup&a=deluser&id=<?=$id5[$k]?>">删除</a></div>
            </div>
            <?php } } ?>
        </div>
        <form class="add-u" method="post" action="index.php?m=user&a=register">
            <div class="add-u-title">添加用户</div>
            <div class="add-u-lan"><span>姓名</span><input type="text" name="name" /></div>
            <div class="add-u-lan"><span>用户名</span><input type="text" name="user" /></div>
            <div class="add-u-lan"><span>密码</span><input type="text" name="passwd" /></div>
            <div class="add-u-lan">
                <span>权限</span>
                <input id="radio" type="radio" name="right" value="100" /><font>管理员</font>
                <input id="radio" type="radio" name="right" value="50" /><font>咨询员</font>
                <input id="radio" type="radio" name="right" value="20" /><font>竞价员</font>
                <input id="radio" type="radio" name="right" value="10" checked="checked" /><font>收费人员</font>
            </div>
            <input id="add-u-submit" type="submit"  value="增加"/>
        </form>
    </div>
</div>
</body>
</html>
