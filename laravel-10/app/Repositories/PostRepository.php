<?php
namespace App\Repositories;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostRepository 
{
    public function paginate(int $perPage =15 ): LengthAwarePaginator {
        return Post::query()
            ->latest('id')
            ->paginate($perPage);
    }

    public function find(int $id): Post {
        return Post::query()-> findOrFail($id);
    }

    public function create(array $data): Post {
        return Post::query()->create($data);
    }

    public function update(Post $post, array $data): Post {
        $post->fill($data)->save();
        return $post;
    }

    public function delete(Post $post): void {
        $post->delete();
    }
}