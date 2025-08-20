<!DOCTYPE html>
<html>
<head>
    <title>新規投稿作成</title>
</head>
<body>
    <h1>投稿作成</h1>

    {{-- バリデーションエラーメッセージ表示エリア --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- 投稿フォーム --}}
    <form action="{{ url('/posts/store') }}" method="POST">
        @csrf {{-- CSRF対策 --}}
        
        <div>
            <label for="title">タイトル</label><br>
            <input type="text" name="title" value="{{ old('title') }}">
        </div>

        <div>
            <label for="content">本文</label><br>
            <textarea name="content">{{ old('content') }}</textarea>
        </div>

        <div>
            <button type="submit">投稿する</button>
        </div>
    </form>
</body>
</html>
