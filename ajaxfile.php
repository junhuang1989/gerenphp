<?php
//ini_set("memory_limit","80M");
$name='./'.$_REQUEST['name'];
 //$c=mb_detect_encoding($name, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
$name=iconv("UTF-8","GB2312", $name);	
$count=$_REQUEST['n'];
$k=$_REQUEST['k'];
sleep($k);
file_put_contents($name,file_get_contents($_FILES[$k]["tmp_name"]),FILE_APPEND);




/*
//ini_set("memory_limit","80M");
$name='./'.$_REQUEST['name'];
 //$c=mb_detect_encoding($name, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
$name=iconv("UTF-8","GB2312", $name);	
$count=$_REQUEST['n'];
$k=$_REQUEST['k'];
for($i=1;$i<=$count;$i++){
	$arr[$i]=$i;
}
$key=array_search($k,$arr);
sleep($key);
if($key==1){
	move_uploaded_file($_FILES[1]["tmp_name"],$name);
}else{
    file_put_contents($name,file_get_contents($_FILES[$key]["tmp_name"]),FILE_APPEND);
}
*/





/*
$name='./'.$_REQUEST['name'];
 //$c=mb_detect_encoding($name, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
$name=iconv("UTF-8","GB2312", $name);	
$count=$_REQUEST['n'];
$k=$_REQUEST['k'];
if($k==1){
	move_uploaded_file($_FILES[1]["tmp_name"],$name);
	exit;
}
for($i=2;$i<=$count;$i++){
   $arr[$i]=$i;
}
if(!empty($arr)){
	t($k,$arr,$name);
}
//还是失败，原因在于每个请求的值是独立的，在其页面执行的每个数组也是独立的
//这就导致哪个页面执行速度快谁就最先执行file_put_contents。所以函数中的unset
//只是针对当前请求的值操作，并没有影响到其他请求的值变化。
function t($key,$arr,$name){	
	if($key==min($arr) && file_exists($name)){
		echo $key;
		$str='['.$key.'--'.time().']'.'文件名:'.$_FILES[$key]["tmp_name"].PHP_EOL;
		file_put_contents('./log.txt',$str,FILE_APPEND);
		file_put_contents($name,file_get_contents($_FILES[$key]["tmp_name"]),FILE_APPEND);
		unset($arr[$key]);
	}else{
		print_r($arr);
	   unset($arr[min($arr)]);
       t($key,$arr,$name);
	}
}
*/
//print_r(apache_request_headers());







