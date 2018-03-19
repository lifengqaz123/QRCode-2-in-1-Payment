<?php
//  Code by p4ndora.
//  www.progtree.cn
//  http://www.progtree.cn/?p=103
$ua = $_SERVER['HTTP_USER_AGENT'];
if (strpos($ua, 'MicroMessenger')) {
    $type = 'wepay';
    $name = '微信支付';
    $url = 'wxp://f2f0JG_gcoclfMI3-WzmlCSo0YdqYimYL8-7';//微信支付链接
    $icon_img = '<img src="img/wx.jpg" width="48px" height="48px" alt="' . $name . '">';
} elseif (strpos($ua, 'AlipayClient')) {
    $url = 'HTTPS://QR.ALIPAY.COM/FKX08154U5F2H5RLLWGX25';//支付宝链接
    header('location: ' . $url);
} else {
    $type = 'other';
    $name = '打赏作者';
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $icon_img = '<img src="img/img.jpg" width="48px" height="48px" alt="' . $name . '">';
}
$qr_img = '<img src="http://pan.baidu.com/share/qrcode?w=400&h=400&url=' . urlencode($url) . '">';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $name ?></title>
    <style type="text/css">
        * {
            margin: auto;
            padding: 0;
            border: 0;
        }

        html {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%
        }

        body {
            font-family: -apple-system, SF UI Text, Arial, Microsoft YaHei, Hiragino Sans GB, WenQuanYi Micro Hei, sans-serif;
            color: #333;
        }

        img {
            max-width: 100%;
        }

        h3 {
            padding: 10px;
        }

        .container {
            text-align: center;
        }

        .title {
            padding: 2em 0;
            background-color: #fff;
        }

        .content {
            padding: 2em 1em;
            color: #fff;
        }

        .wepay {
            background-color: #23ac38;
        }

        .qq {
            background-color: #4c97d5;
        }

        .other {
            background-color: #ff7055;
        }
    </style>
</head>
<body class="<?= $type ?>">
<div class="container">
    <div class="title"><?= $icon_img ?><h1><?= $name ?></h1></div>
    <div class="content"><?= $type == 'other' ? $qr_img . '<h3>请使用支付宝、微信、QQ客户端扫码付款</h3>' : $qr_img . '<h3>扫描或长按识别二维码，向TA付款</h3>' ?></div>
</div>
</body>
</html>
