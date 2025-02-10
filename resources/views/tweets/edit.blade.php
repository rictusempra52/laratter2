<!-- resources/views/tweets/edit.blade.php -->

<!-- アプリケーションのレイアウトを使用 -->
<x-app-layout>
    <!-- ヘッダーセクションのスロットを定義 -->
    <x-slot name="header">
        <!-- ヘッダーのタイトルを設定 -->
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tweet編集') }} <!-- 'Tweet編集'というテキストを表示 -->
        </h2>
    </x-slot>

    <!-- メインコンテンツのパディングを設定 -->
    <div class="py-12">
        <!-- コンテンツの最大幅を設定し、中央に配置 -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- 背景色とシャドウを設定したコンテナ -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- コンテナ内のパディングとテキスト色を設定 -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- 詳細ページへのリンク -->
                    <a href="{{ route('tweets.show', $tweet) }}" class="text-blue-500 hover:text-blue-700 mr-2">詳細に戻る</a>
                    <!-- フォームの開始。POSTメソッドで送信し、tweets.updateルートに送信 -->
                    <form method="POST" action="{{ route('tweets.update', $tweet) }}">
                        @csrf <!-- CSRFトークンを含めることでセキュリティを確保 -->
                        @method('PUT') <!-- PUTメソッドを使用することを指定 -->
                        <!-- フォームグループの開始 -->
                        <div class="mb-4">
                            <!-- ラベルの設定 -->
                            <label for="tweet"
                                class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Edit Tweet</label>
                            <!-- テキスト入力フィールド -->
                            <input type="text" name="tweet" id="tweet" value="{{ $tweet->tweet }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <!-- バリデーションエラーメッセージの表示 -->
                            @error('tweet')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- 送信ボタン -->
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
