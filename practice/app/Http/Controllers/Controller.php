<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;


abstract class Controller
{
    //
}

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        Post::create($validated);
        return redirect()->route('posts.index')->with('success', '게시글이 생성되었습니다.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $post->update($validated);
        return redirect()->route('posts.show', $post)->with('success', '게시글이 수정되었습니다.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', '게시글이 삭제되었습니다.');
    }
}