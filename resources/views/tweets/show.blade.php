<!-- resources/views/tweets/show.blade.php -->

<!-- アプリケーションのレイアウトを使用 -->
<x-app-layout>
    <!-- ヘッダー部分のスロット -->
    <x-slot name="header">
        <!-- ヘッダーのタイトル -->
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tweet詳細') }} <!-- 'Tweet詳細'というテキストを表示 -->
        </h2>
    </x-slot>

    <!-- メインコンテンツのパディング -->
    <div class="py-12">
        <!-- コンテンツの最大幅を設定 -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- カードのスタイルを設定 -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- カードの内部パディング -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- 一覧に戻るリンク -->
                    <a href="{{ route('tweets.index') }}" class="text-blue-500 hover:text-blue-700 mr-2">一覧に戻る</a>
                    <!-- ツイートの内容を表示 -->
                    <p class="text-gray-800 dark:text-gray-300 text-lg">{{ $tweet->tweet }}</p>
                    <!-- 投稿者の名前を表示 -->
                    <p class="text-gray-600 dark:text-gray-400 text-sm">投稿者: {{ $tweet->user->name }}</p>
                    <!-- 作成日時と更新日時を表示 -->
                    <div class="text-gray-600 dark:text-gray-400 text-sm">
                        <p>作成日時: {{ $tweet->created_at->format('Y-m-d H:i') }}</p>
                        <p>更新日時: {{ $tweet->updated_at->format('Y-m-d H:i') }}</p>
                    </div>
                    <!-- ログインユーザーが投稿者の場合、編集と削除のリンクを表示 -->
                    @if (auth()->id() == $tweet->user_id)
                        <div class="flex mt-4">
                            <!-- 編集リンク -->
                            <a href="{{ route('tweets.edit', $tweet) }}"
                                class="text-blue-500 hover:text-blue-700 mr-2">編集</a>
                            <!-- 削除フォーム -->
                            <form action="{{ route('tweets.destroy', $tweet) }}" method="POST"
                                onsubmit="return confirm('本当に削除しますか？');">
                                @csrf <!-- CSRFトークンを含める -->
                                @method('DELETE') <!-- DELETEメソッドを使用 -->
                                <button type="submit" class="text-red-500 hover:text-red-700">削除</button>
                            </form>
                        </div>
                    @endif
                    <!-- いいね機能の表示 -->
                    <div class="flex mt-4">
                        <!-- 既にいいねしている場合 -->
                        @if ($tweet->liked->contains(auth()->id()))
                            <!-- いいね解除フォーム -->
                            <form action="{{ route('tweets.dislike', $tweet) }}" method="POST">
                                @csrf <!-- CSRFトークンを含める -->
                                @method('DELETE') <!-- DELETEメソッドを使用 -->
                                <!-- いいね解除ボタン -->
                                <button type="submit" class="text-red-500 hover:text-red-700">dislike
                                    {{ $tweet->liked->count() }}</button>
                            </form>
                        @else
                            <!-- いいねフォーム -->
                            <form action="{{ route('tweets.like', $tweet) }}" method="POST">
                                @csrf <!-- CSRFトークンを含める -->
                                <!-- いいねボタン -->
                                <button type="submit" class="text-blue-500 hover:text-blue-700">like
                                    {{ $tweet->liked->count() }}</button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    