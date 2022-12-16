<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //Validation
    protected $guarded = ['id'];

    public static $rules = [
        'body' => ['required', 'string', 'max:255'],
    ];

    //論理削除
    use SoftDeletes;
    //メンバ変数 $dates に deleted_at をセットする
    protected $dates = ['deleted_at'];
}
