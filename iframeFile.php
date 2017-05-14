<?php
   /*这里可以写逻辑代码*/  
   	if($_FILES['img']['error']==0){
	       $file=$_FILES['img'];
   			move_uploaded_file($file['tmp_name'],"./1.jpg");
   	}   
?>
<script>
 parent.document.getElementById('regres').innerHTML="接收到数据:<?php echo $_POST['user'].'和文件'.$_FILES['img']['name'];?>";
</script>