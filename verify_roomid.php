<?php
// 没有使用
$arr=array();
if ($_GET["roomid"]=="" || !file_exists("config/".$_GET["roomid"].".php")){
    $arr["status"]="fail";
    $arr["message"]="未找到该房间";
    http_response_code(404);
}else{
    $arr["status"]="ok";
    $arr["message"]="已找到该房间";
}
$json=json_encode($arr,JSON_UNESCAPED_UNICODE);
echo $json;
?>