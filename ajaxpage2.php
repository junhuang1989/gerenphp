<?php
   $perpage=5;
   $page=isset($_GET['p'])?$_GET['p']:1;
   //$page=$_GET['p'];
   $offset=($page-1)*$perpage;
   $limit=$offset.','.$perpage;
   mysql_connect('127.0.0.1','root','stwan');
   mysql_select_db('boolshop');
   mysql_query('set names utf8');
   $where='';
   if(!empty($_POST['sp'])){
      $where="shop_price>=".$_POST['sp'];
   }
   //此处如果不用between那么需要if判断，为了简写用between
   if(!empty($_POST['ep'])){
      $sp=empty($_POST['sp'])?0:$_POST['sp'];
      $where="shop_price between ".$sp." and ".$_POST['ep'];
   }
   if(!empty($_POST['gn'])){
      if(!empty($_POST['sp'])||!empty($_POST['ep']))
         $where.=" and goods_name like '%".$_POST['gn']."%'";
      else
         $where="goods_name like '%".$_POST['gn']."%'";
   }
   $orderby='goods_id';
   $orderway='asc';
   if(!empty($_POST['ob'])&&in_array($_POST['ob'],array('goods_id','shop_price')))
      $orderby=$_POST['ob'];
   if(!empty($_POST['ow'])&&in_array($_POST['ow'],array('asc','desc')))
      $orderway=$_POST['ow'];
   if(empty($_POST['gn'])&&empty($_POST['sp'])&&empty($_POST['ep']))
      $sql='select * from goods order by '.$orderby.' '.$orderway.' limit '.$limit;
   else
      $sql='select * from goods where '.$where.' order by '.$orderby.' '.$orderway.' limit '.$limit;
   file_put_contents('./sql.txt', $sql.'\r\n',FILE_APPEND);
   $res=mysql_query($sql);
   $data=array();
   while($row=mysql_fetch_assoc($res)){
          $data[]=$row;
   }
   mysql_free_result($res);
   if(empty($_POST['gn'])&&empty($_POST['sp'])&&empty($_POST['ep']))
      $sql='select count(*) from goods';
   else
      $sql='select count(*) from goods where '.$where;
   $res=mysql_query($sql);
   $row=mysql_fetch_row($res);
   mysql_free_result($res);
   mysql_close();
   $count=$row[0];
   $totlepage=ceil($count/$perpage);
   echo json_encode(array('data' =>$data ,'totlepage'=>$totlepage ));
  
   
