<?php
if ($_GET["roomid"]=="" || !file_exists("config/".$_GET["roomid"].".php")){
    echo '{"status":"fail","message":"房间号不存在"}';
    // http_response_code(404);
    die();
}
include "config/".$_GET["roomid"].".php";
date_default_timezone_set('Asia/Shanghai');
$tm=time();
{
    $flag=0;
    for($i=0;$i<count($bgn);$i++){
        if($tm>=$bgn[$i] && $tm<=$end[$i]){
            $flag=1;
            break;
        }
    }
    if($flag==0){
        echo '{"status":"fail","message":"不在规定时间内"}';
        http_response_code(403);
        die();
    }

}
// 处理基本的链接限额
{
    // http_response_code(404);
    $fdata=fopen("data/".$_GET["roomid"]."/time.txt","r");
    fscanf($fdata,"%d %d",$lst,$cishu);
    fclose($fdata);
    $cishu=intval($cishu);
    $lst=intval($lst);
    $cishu=intval($cishu);
    // echo sprintf("%d %d %d",$tm,$lst,$cishu);
    $fdata=fopen("data/".$_GET["roomid"]."/time.txt","w");
    if($tm-$lst<=0){
        if($cishu>=$fqnc_limit){
            fprintf($fdata,"%d %d",$tm,$cishu);
            fclose($fdata);
            // echo '{"status":"fail","message":"弹幕池已满，请重新发送"}';
            // http_response_code(404);
            // die();
        }
        $cishu++;
    }else{
        $cishu=1;
        $lst=$tm;
    }
    fprintf($fdata,"%d %d",$tm,$cishu);
}
$arr=array();
$arr["userid"]=$_POST["userid"];
$arr["color"]=$_POST["color"];
$arr["text"]=$_POST["text"];
$arr["type"]=$_POST["type"];
$arr["status"]="OK";
// $arr["process"]="ignore";
$arr["time"]=$tm;
$json=json_encode($arr);
echo $json;
$file=fopen("data/".$_GET["roomid"]."/getdata.txt","a");
$file2=fopen("data/".$_GET["roomid"]."/history.txt","a");
// fprintf($file,"%s\n",$json);
$json=json_encode($arr);
fwrite($file,$json."\r\n");
fwrite($file2,$json."\r\n");
?>