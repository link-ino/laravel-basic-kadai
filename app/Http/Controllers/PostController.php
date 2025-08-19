<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
public function index()
{
    $posts = DB::table('posts')->get();
    return view('posts.index', compact('posts'));
}

public function show($id)
{
    // IDに対応するPostをDBから取得
     $post = Post::find($id);
    // ビューに渡して表示（例: resources/views/posts/show.blade.php）
    return view('posts.show', compact('post'));
}

}
