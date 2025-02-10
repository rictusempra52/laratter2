<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

// トップページを表示するためのルーティング
Route::get('/', function () {
    return view('welcome');
});

// ダッシュボードを表示するためのルーティング
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ユーザー認証が必要なルーティングをグループ化
Route::middleware('auth')->group(function () {
    // プロフィール編集画面を表示するためのルーティング
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // プロフィール更新のためのルーティング
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // プロフィール削除のためのルーティング
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // ツイートのCRUD操作を行うためのルーティング
    Route::resource('tweets', TweetController::class);
});

require __DIR__.'/auth.php';
