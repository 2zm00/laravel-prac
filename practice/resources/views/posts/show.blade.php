@extends('layouts.app')

@section('content')
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
    <small>작성일: {{ $post->created_at->format('Y-m-d H:i') }}</small>
    <div class="mt-3">
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">수정</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('삭제할까요?')" class="btn btn-danger">삭제</button>
        </form>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">목록</a>
    </div>
@endsection
