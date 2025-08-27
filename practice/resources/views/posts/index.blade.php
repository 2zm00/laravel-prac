@extends('layouts.app')

@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">글 작성</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>제목</th>
                <th>작성일</th>
                <th>기능</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
                <td>{{ $post->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">수정</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('삭제할까요?')" class="btn btn-sm btn-danger">삭제</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection
