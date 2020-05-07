<?php
//文件上传
function upload($filename)
{
    //上传过程是否有错，
    if (request()->file($filename)->isValid()){
        //接收上传
        $file = request()->$filename;
        //实现上传
        $path =$file->store('uploads');
        return $path;

    }
    exit('文件上传出错');

}
//多文件上传
function moreupload($filename)
{
    $file = request()->$filename;
    if(!is_array($file)) {
        return;
    }
    foreach ($file as $k=>$v) {
        //实现上传
        $path[$k] = $v->store('uploads');
    }
    return $path;
    exit('上传文件出错');
}
