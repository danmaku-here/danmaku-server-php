<?php
include "config.php";
if($_GET["passwd"]==$passwd){//验证通过密码之后添加
    if($_GET["roomid"]!=""){
        $roomid=$_GET["roomid"];
    }else{
        echo "请加入id=房间号";
        http_response_code(404);
        die();
    }
}else{
    echo "请验证密码之后再添加房间";
    http_response_code(403);
    die();
}
mkdir("data/".$roomid."/");
$file=fopen("data/".$roomid."/time.txt","w");
fprintf($file,"0 0");
fclose($file);
$file=fopen("data/".$roomid."/getdata.txt","w");
fprintf($file,"");
fclose($file);
$file=fopen("data/".$roomid."/history.txt","w");
fprintf($file,"");
fclose($file);
copy("config/example_php","config/".$roomid.".php");
echo "部署成功";
echo "<a></a>";
echo sprintf("<a href='help.php?roomid=%s'>点这里打开配置地址页面</a>",$roomid);
?>