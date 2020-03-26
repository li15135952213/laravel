<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // 指定表名
    protected $table='Article';
    protected $primaryKey='id';
    public $timestamps=false;
    // 黑名单
    protected $guarded=[];
}
