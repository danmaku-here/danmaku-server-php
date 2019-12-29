<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>帮助</title>
</head>
<body>
    <?php
    include "config.php";
        function addline($text){
            echo "<p>".$text."</p>";
        }
        if($_GET["roomid"]==""){
            addline("请在本帮助网址后面加上?roomid=xxxx");
            $roomid="xxx";
            // die(0);
        }else{
            $roomid=$_GET["roomid"];
        }
        addline("在软件的配置地址中填入下面的地址");
        addline($back_url."get.php?roomid=".$roomid);
        addline("前端BACKEND_URL(send.html Line143)设置是（这个和roomid无关，设置一次即可）");
        addline('BACKEND_URL = "http://doc.zsh2517.com/back/send.php?roomid="+roomid;');
        addline("用户地址如下");
        addline($front_url."index.html?roomid=".$roomid);
        addline("下面是二维码");
    ?>
    <div ID="qrcode"></div>
    <script type="text/javascript" src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.staticfile.org/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
    <script>
    $("#qrcode").qrcode({
        width:256,
        height:256,
        text:"<?php echo $front_url."index.html?roomid=".$roomid?>"
    })
    </script>

</body>
</html>