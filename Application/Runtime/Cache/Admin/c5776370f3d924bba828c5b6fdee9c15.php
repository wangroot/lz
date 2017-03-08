<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心</title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/lz/Public/Admin/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/lz/Public/Admin/Styles/main.css" rel="stylesheet" type="text/css" />
<script src="/lz/Public/Admin/Js/jquery-1.10.1.min.js"></script>
</head>
<body>
<h1>
    <span class="action-span1"><a href="#">平台录入管理中心</a> </span>
    <span id="search_id" class="action-span1"></span>
    <div style="clear:both"></div>
</h1>
<div class="list-div">
<form name="demo" method="post" action="<?php U('Index/main'); ?>">
    <table cellspacing='1' cellpadding='3'>

         
         <!-- 被推广的 -->
         <tr>
            <th colspan="1" class="group-title"><strong>平台/团队名称</strong></th>
            <th colspan="1" class="group-title"><strong>联系方式</strong></th>
            <th colspan="1" class="group-title"><strong>平台类型</strong></th>
            <th colspan="1" class="group-title"><strong>最低充值</strong></th>
            <th colspan="1" class="group-title"><strong>最低提款</strong></th>
            <th colspan="1" class="group-title"><strong>简单介绍</strong></th>
            <th colspan="1" class="group-title"><strong>钻石</strong></th>
            <th colspan="1" class="group-title"><strong>提交</strong></th>
            
        </tr>
         <?php foreach ($alteam['data'] as $k => $v): ?>

        <tr>
            <td width="10%">
            
            		<?php echo $v['name']; ?>
            
            </td>
            <td width="10%">
            		<?php echo $v['contact']; ?>
			</td>
            <td width="10%">
            		<?php echo $v['type']; ?>
			</td>
            <td width="10%">
            		<?php echo $v['minimum_recharge']; ?>
            </td>
            <td width="10%">
            		<?php echo $v['minimum_withdrawal']; ?>
            </td>
            <td width="30%">
            		<?php echo $v['introduction']; ?>
            </td>
            <input name="id" value="<?php echo $v['id']; ?>" type="hidden">
            <td width="10%"><input name="id" value="" type="radio"></td>
            <td width="10%"><button name="promote" value="1" type="submit">修改</button></td>
        	
        </tr>
         <?php endforeach; ?>

    </table>
    	<div class="pagination"><?php echo $alteam['page']; ?></div>
   </form>
</div>
<!-- end order statistics -->
<br />

<script>
$(document).ready(function () {
	
    // 开启实时获取数据更新
    var timeTicket;
    var temperature;
    var humidity;
    var axisData;
   // var newdata = 3800;
    timeTicket = setInterval(function () {
        // 获取实时更新数据
        
        //++newdata;
        $.ajax({
        	type:"post",
            async:false,
            url:"<?php echo U('Home/Team/get'); ?>",
           // data: {type: newdata},
            dataType:"json",
            success: function (data) {
            	//console.log(data);
            }
            
        });

    }, 5000);
});

</script>

</body>
</html>