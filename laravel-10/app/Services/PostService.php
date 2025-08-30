<?php
namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PostService 
{

    public function __construct(private PostRepository $repo) {}

    public function list(int $perPage = 15) {
        return $this->repo->paginate($perPage);
    }

    public function detail(int $id): Post {
        return $this->repo->find($id);
    }
    
    public function create(array $input): Post {
        return DB::transaction(function () use ($input) {
            $input['slug'] = Str::slug($input['title']).'-'.Str::random(6);
            return $this->repo->create($input);
        });
    }
    
    public function update(Post $post, array $input): Post
    {
        return DB::transaction(function () use ($post, $input) {
            if (isset($input['title'])) {
                $input['slug'] = Str::slug($input['title']).'-'.Str::random(6);
            }
            return $this->repo->update($post, $input);
        });
    }

    public function delete(Post $post): void
    {
        DB::transaction(fn() => $this->repo->delete($post));
    }
    
}