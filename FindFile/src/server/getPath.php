<?php
    $code=0;
	$data=[];
	$msg=["注册失败","注册成功","已经注册"];//提示信息
    $nowTime=time();
// 获取本地目录的文件列表
$file = 'G:/ceshi';
if (is_readable($directory)) {
    $code=1;
    getApiResult($code, $msg[$code],$data);
} else {
    
    getApiResult($code, $msg[$code],$data);
}

// // 获取文件列表
// $fileList = scandir($file);

// // 过滤掉.和..目录
// $fileList = array_diff($fileList, array('.', '..'));

// // 返回文件列表到前端
// header('Content-Type: application/json');
// echo json_encode($fileList);
?>