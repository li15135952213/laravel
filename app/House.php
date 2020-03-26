<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    //指定表明
    protected $table = 'house';
    //指定主键
    protected $primaryKey = 'id';
    //屏蔽时间戳
    public $timestamps = false;
    //设置黑名单
    protected $guarded = [];
}
