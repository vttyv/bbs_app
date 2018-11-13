<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 配列内のカラムのみ入力可能
    protected $fillable = [
            'comment', 'updated_at', 'post_id' //, 'article_id', 'name', 'fixed_id'
    ];
}
