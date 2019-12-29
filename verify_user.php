<?php
$arr=array();
$arr["status"]="ok";
$arr["message"]="已找到该用户";
$json=json_encode($arr,JSON_UNESCAPED_UNICODE);
echo $json;
?>