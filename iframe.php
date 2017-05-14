<?php
   /*这里可以写逻辑代码*/
mysql_connect('127.0.0.1','root','zlwan');
mysql_query('use boolshop');
mysql_query('set names utf8');
$sql='select * from goods_type';
$res=mysql_query($sql);
while ($row=mysql_fetch_row($res)) {
	$arr[]=$row;
}
mysql_free_result($res);
mysql_close();
print_r($arr);
?>
<script>
 parent.document.getElementById('regres').innerHTML="接收到数据<?php echo $_POST['user'];?>";
</script>
