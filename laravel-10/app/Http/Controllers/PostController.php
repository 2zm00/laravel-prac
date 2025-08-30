<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;

class PostController extends Controller
{
    public function __construct(private PostService $service) {}

    public function index()
    {
        $posts = $this->service->list(request('per_page', 15));
        return PostResource::collection($posts);
    }

    public function show(int $id)
    {
        return new PostResource($this->service->detail($id));
    }

    public function store(StorePostRequest $request)
    {
        $post = $this->service->create($request->validated());
        return new PostResource($post);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post = $this->service->update($post, $request->validated());
        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        $this->service->delete($post);
        return response()->noContent();
    }
}
