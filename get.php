<?php
   $str=file_get_contents('./1.txt');
   echo $str;
   if($_GET)
   	   file_put_contents('./1.txt',$_GET['p']);
#合并分支
?>