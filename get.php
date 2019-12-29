<?php
if ($_GET["roomid"]=="" || !file_exists("config/".$_GET["roomid"].".php")){
    http_response_code(403);
    die(0);
}
$text=file_get_contents("data/".$_GET["roomid"]."/getdata.txt");
$file=fopen("data/".$_GET["roomid"]."/getdata.txt","w");
fwrite($file,"");
fclose($file);
echo $text;
?>