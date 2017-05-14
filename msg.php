<?php
 $conn=mysql_connect('127.0.0.1','root','stwan');
 mysql_query('set names utf8');
 mysql_query('use test');
 if(!empty($_POST['id'])){
 	 $sql='select title,content from msg where id='.$_POST['id'];
 	 $res=mysql_query($sql,$conn);
 	 //或者赋值后用$row判断
 	 if(mysql_num_rows($res)>0){
 	 	  $row=mysql_fetch_row($res);
 	 	  $msg=$row[0].$row[1];
 	 	  mysql_free_result($res);
 	 	  mysql_close();
 	 }else{
 	 	$msg='没有该ID的信息';
 	 }
 }else{
 	$msg='请输入ID';
 }
 print_r($msg);
