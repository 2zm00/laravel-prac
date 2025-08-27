@extends('layouts.app')

@section('content')
    <h2>글 수정</h2>
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>제목</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label>내용</label>
            <textarea name="content" rows="5" class="form-control">{{ old('content', $post->content) }}</textarea>
            @error('content')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button class="btn btn-primary">수정 완료</button>
    </form>
@endsection
