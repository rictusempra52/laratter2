<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tweet extends Model
{
    /** @use HasFactory<\Database\Factories\TweetFactory> */
    use HasFactory;

    // モデルには、$fillableプロパティを使って、ユーザーが入力したデータを保存するカラムを指定します。
    protected $fillable = ['tweet'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // いいねしたユーザーを取得するメソッド
    public function liked()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
