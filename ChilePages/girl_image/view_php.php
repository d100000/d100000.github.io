<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../common/http_help.php';


$str='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title></title>
<style type="text/css">
*{
    margin:0;
    padding: 0;
}

body{
    background-color: #888888;
}

.container{
    margin: 60px auto;
    width: 700px;
    height: 450px;
    position: relative;
    z-index: 3;

}

.container img{
    margin: 5px 5px 5px 5px;
    padding: 5px 5px 5px;
    background: white;
    border: 1px solid white;
    box-shadow: 2px 2px 2px black;
    transition: all 0.3s ease-in ;
}

.container img:hover{
    z-index: 1;
    transform: scale(2.0);
    position: relative;
}

.pic{
    width: 300px;
    height: 200px;
}

</style>
</head>
<body>
<div class="container">';

$end='
</div>
</body>
</html>';


$url='http://apis.baidu.com/txapi/mvtp/meinv?';
$params=['num'=>'50'];
$header=['apikey'=>'253aecb000f46a13f9ccf56054580808'];

$res=send_request($url, $params, 'GET','',30,$header);
$res=  json_decode($res,true);

if($res['code']!=200){
    echo 'fail no';
}

echo $str;
foreach ($res['newslist'] as $key=>$item){
    echo '<img class="pic pic'.$key.'" src="'.$item['picUrl'].'">';
}
echo $end;
