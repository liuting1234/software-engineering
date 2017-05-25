<? if(!defined('RAIN') || !defined('RAIN_USER')) header("Location:index.php?m=user");?>


<?php if(isset($id) and is_array($id)){ ?>
<table class="rt" width="100%" border="0" align="center" cellspacing="1" cellpadding="0">
  <tr>
    <th>预约号码</th>
    <th>姓名</th>
    <th>性别</th>
    <th>年龄</th>
    <th>电话</th>
    <th>预约方式</th>
    <th>病种分类</th>
    <th>预约时间</th>
    <th>预约医生</th>
    <th>备注</th>
    <th>到院时间</th>
    <th>咨询员</th>
    <th width="50px">操作</th>
  </tr>
   <?php foreach($id as $k=>$v) {?> 
  <tr align="center" id="tr">
    <td><?=$yyh[$k]?></td>
    <td><?=$name[$k]?></td>
    <td><?php if($sex[$k]==1){echo '女';}else{echo '男';}?></td>
    <td><?=$age[$k]?></td>
    <td><?=$contact[$k]?></td>
    <?php if($way[$k]==1){echo '<td>电话</td>';}else{echo '<td style="background:#1DA848;color:#FFF">网络</td>';}?>
    <td><?=$class[$k]?></td>
    <td><?php if($appdate[$k]==''){echo '待定';}else{echo $appdate[$k];}?></td>
    <td><?=$doctor[$k]?></td>
    <td><?=$memo[$k]?></td>
    <?php if($arrive[$k]=='0000-00-00'){echo '<td>未到</td>';}else{echo '<td style="background:#1DA848;color:#FFF">'.$arrive[$k].'</td>';}?>
    <td><?=$consult[$k]?></td>
    <td><a href="index.php?m=editpatient&id=<?=$id[$k]?>">查看</a></td>
  </tr>
   <?php } }else{echo '没有查询到您要的内容，请重新输入！';} ?>
</table>

