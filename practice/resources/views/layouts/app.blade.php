<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>게시판 프로젝트</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h1><a href="{{ route('posts.index') }}">Simple 게시판</a></h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
</body>
</html>
