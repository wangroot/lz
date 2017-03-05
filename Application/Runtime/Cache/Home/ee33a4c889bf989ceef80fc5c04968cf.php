<?php if (!defined('THINK_PATH')) exit();?><html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>【平台吧】平台/团队公开评价网-推荐信誉平台-揭露黑平台-垃圾团队</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="IE=7" />
<link rel="shortcut icon" href="/lz/Public/Home/style/icon.gif" type="image/x-icon">
<link rel="stylesheet" href="/lz/Public/Home/style/default.css" tppabs="http://www.lianmeng.la/style/default.css" type="text/css"/>
<script src="/lz/Public/Home/style/hm.js"></script><script src="/lz/Public/Home/style/jquery-1.js" type="text/javascript"></script>
<script src="/lz/Public/Home/style/logger.js"></script>
<link href="/lz/Public/Home/style/bdsstyle.css" rel="stylesheet" type="text/css">
</head>
<body>
							<form action="<?php U('Team/page'); ?>" name="demo" id="demo" method="post">
								<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="commenttable">
									<tr>
										<td height="60"><strong>评分：</strong></td>
										<td colspan="2">
											<table border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td width="280">
														<div class="shop-rating">
															<span class="title">信誉度：</span>
															 <ul class="uls">
															  <li class="star1" name="star1" value=""><input type="hidden" id = "a" name="star1" value="" /><a href="javascript:;">1</a></li>
															  <li class="star1" name="star1" value=""><input type="hidden" name="star1" value="" /><a href="javascript:;">2</a></li>
															  <li class="star1" name="star1" value=""><input type="hidden" name="star1" value="" /><a href="javascript:;">3</a></li>
															  <li class="star1" name="star1" value=""><input type="hidden" name="star1" value="" /><a href="javascript:;">4</a></li>
															  <li class="star1" name="star1" value=""><input type="hidden" name="star1" value="" /><a href="javascript:;">5</a></li>
															 </ul>
															<span class="result" id="stars1-tips"></span>
															<div id = "b"></div>
															<input type="hidden" class="star1" name="p1" value="" size="2" />
														</div>
													</td>
													<td width="280">
														<div class="shop-rating">
															<span class="title">提款速度：</span>
															 <ul class="uls">
															  <li class="star2" name="star2" value=""><a href="javascript:;">1</a></li>
															  <li class="star2" name="star2" value=""><a href="javascript:;">2</a></li>
															  <li class="star2" name="star2" value=""><a href="javascript:;">3</a></li>
															  <li class="star2" name="star2" value=""><a href="javascript:;">4</a></li>
															  <li class="star2" name="star2" value=""><a href="javascript:;">5</a></li>
															 </ul>
															<span class="result" id="stars2-tips"></span>
															<input type="hidden" id="stars2-input" name="p2" value="" size="2" />
														</div>
													</td>
												</tr>
												<tr>
													<td width="280">
														<div class="shop-rating">
															<span class="title">彩种丰富度：</span>
															 <ul class="uls">
															  <li class="star3" name="star3" value=""><a href="javascript:;">1</a></li>
															  <li class="star3" name="star3" value=""><a href="javascript:;">2</a></li>
															  <li class="star3" name="star3" value=""><a href="javascript:;">3</a></li>
															  <li class="star3" name="star3" value=""><a href="javascript:;">4</a></li>
															  <li class="star3" name="star3" value=""><a href="javascript:;">5</a></li>
															 </ul>
															<span class="result" id="stars3-tips"></span>
															<input type="hidden" id="stars3-input" name="p3" value="ss" size="2" />
														</div>
													</td>
													<td width="280">
														<div class="shop-rating">
															<span class="title">玩法丰富度：</span>
															 <ul class="uls">
															  <li class="star4" name="star4" value=""><a href="javascript:;">1</a></li>
															  <li class="star4" name="star4" value=""><a href="javascript:;">2</a></li>
															  <li class="star4" name="star4" value=""><a href="javascript:;">3</a></li>
															  <li class="star4" name="star4" value=""><a href="javascript:;">4</a></li>
															  <li class="star4" name="star4" value=""><a href="javascript:;">5</a></li>
															 </ul>
															<span class="result" id="stars4-tips"></span>
															<input type="hidden" id="stars4-input" name="p4" value="" size="2" />
														</div>
													</td>
												</tr>
												<tr>
													<td width="280">
														<div class="shop-rating">
															<span class="title">客服服务质量：</span>
															 <ul class="uls">
															  <li class="star5" name="star5" value=""><a href="javascript:;">1</a></li>
															  <li class="star5" name="star5" value=""><a href="javascript:;">2</a></li>
															  <li class="star5" name="star5" value=""><a href="javascript:;">3</a></li>
															  <li class="star5" name="star5" value=""><a href="javascript:;">4</a></li>
															  <li class="star5" name="star5" value=""><a href="javascript:;">5</a></li>
															 </ul>
															<span class="result" id="stars3-tips"></span>
															<input type="hidden" id="stars3-input" name="p5" value="" size="2" />
														</div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td height="10" colspan="3">&nbsp;</td>
									</tr>
									<tr>
										<td width="8%" height="30"><strong>昵称：</strong></td>
										<td colspan="2"><input name="cname" type="text" id="cname" value="匿名" size="10" /></td>
									</tr>
									<tr>
										<td height="32"><strong>标题：</strong></td>
										<td colspan="2"><input name="csubject" type="text" id="csubject" value="点评：<?php echo $data[0]['name']; ?>" size="40" /></td>
									</tr>
									<tr>
										<td height="120"><strong>内容：</strong></td>
										<td colspan="2"><textarea name="ccontent" cols="50" id="ccontent"></textarea></td>
									</tr>
									<tr>
										<td height="24">
											<input name="belong" type="hidden" id="belong" value="253" />
										</td>
										<td width="11%"><input type="submit" name="button" id="button" value=" 提交 "/></td>
										<td width="81%"><font color="#333333">* 恶意评论和灌水经本站查明后管理员会将其删除，请网友注意评论者IP，以防被骗。</font></td>
									</tr>
								</table>
							<br />
							</form>


<script>
var cc = document.getElementById("stars3-input");
cc.setAttribute("value","132456789");
console.log(cc);


</script>
<script>


</script>

</body>
</html>