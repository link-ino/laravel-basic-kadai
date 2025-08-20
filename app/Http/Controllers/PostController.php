<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 投稿一覧
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // 投稿詳細
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    // 投稿作成フォーム表示
    public function create()
    {
        return view('posts.create');
    }

    // 投稿保存処理
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title'   => 'required|max:20',
            'content' => 'required|max:200',
        ]);

        // データ保存
        Post::create([
            'title'   => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        // 一覧ページへリダイレクト
        return redirect('/posts');
    }
}
