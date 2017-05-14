<?php

//sleep(5);
   
 $name='./'.$_REQUEST['name'];
 //$c=mb_detect_encoding($name, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
 $name=iconv("UTF-8","GB2312", $name);
if(!file_exists($name)){
     move_uploaded_file($_FILES["part"]["tmp_name"],$name);
     
}else{
    file_put_contents($name,file_get_contents($_FILES["part"]["tmp_name"]),FILE_APPEND);
}

//print_r($_FILES);
