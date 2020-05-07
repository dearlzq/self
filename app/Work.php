<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    //指定表名
    protected $table = 'work';
    //指定主键
    protected $primaryKey = 'w_id';
    //关闭时间戳
    public $timestamps = false;
    //黑名单
    protected $guarded = [];
}
