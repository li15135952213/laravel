<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	//指定表明
    protected $table = 'brand';
    //指定主键
    protected $primaryKey = 'brand_id';
    //屏蔽时间戳
    public $timestamps = false;
    //设置黑名单
    protected $guarded = [];
}
