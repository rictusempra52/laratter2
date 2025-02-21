<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ユーザーがいいねしたツイートを取得するメソッド
    // このメソッドは、ユーザーがいいねした複数のツイートを取得します。
    public function likes()
    {
        return $this->belongsToMany(tweet::class)->withTimestamps();
    }

    /**
     * ユーザーが投稿したツイートを取得するメソッド
     * このメソッドは、ユーザーが所有する複数のツイートを取得します。
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany ユーザーが所有するツイートのリレーションを返します。
     */
    public function tweets()
    {
        return $this->hasMany(tweet::class);
    }
}
