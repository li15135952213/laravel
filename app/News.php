<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
   // 指定表名
    protected $table='news';
    protected $primaryKey='id';
    public $timestamps=false;
    // 黑名单
    protected $guarded=[];
}
