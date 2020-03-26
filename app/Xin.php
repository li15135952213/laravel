<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xin extends Model
{
     // 指定表名
    protected $table='xin';
    protected $primaryKey='id';
    public $timestamps=false;
    // 黑名单
    protected $guarded=[];
}
