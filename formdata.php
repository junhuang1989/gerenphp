<?php
move_uploaded_file($_FILES['img']['tmp_name'],$_FILES['img']['name']);
print_r($_POST);

