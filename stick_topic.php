<?php
 ini_set("error_reporting","E_ALL & ~E_NOTICE"); /**************************************/
  /*		文件名：stick_topic.php		*/
  /*		功能：设置“置顶”操作		*/
  /**************************************/

  require('./config.inc.php');

  //判断是否为管理员
  if ($_SESSION['user_auth'] == 1)
  {
	//取得文章ID
	$id=$_POST['id'];

	//设置“置顶”的SQL语句
	$sql = "UPDATE forum_topic SET sticky='1' WHERE id='$id'";

	$result=query($sql);

	if($result)
	{
		//跳转页面
		header("Location: view_topic.php?id=$id");
	}
	else {
		echo '<script>alert(\'数据库操作错误！\');window.history.back();</script>';
	    exit();
	}

  } else {
	echo '<script>alert(\'你没有管理权限！\');window.history.back();</script>';
	exit();
  }
?>
