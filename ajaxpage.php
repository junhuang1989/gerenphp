<?php
   
   $perpage=5;
   $page=$_GET['p'];
   $offset=($page-1)*$perpage;
   $limit=$offset.','.$perpage;
   mysql_connect('127.0.0.1','root','stwan');
   mysql_select_db('boolshop');
   mysql_query('set names utf8');
   $sql='select * from privilege limit '.$limit;
   $res=mysql_query($sql);
   while($row=mysql_fetch_assoc($res)){
          $data[]=$row;
   }
   mysql_free_result($res);
   $sql='select count(*) from privilege';
   $res=mysql_query($sql);
   $row=mysql_fetch_row($res);
   mysql_free_result($res);
   mysql_close();
   $count=$row[0];
   $totlepage=ceil($count/$perpage);
   echo json_encode(array('data' =>$data ,'totlepage'=>$totlepage ));
  
   
