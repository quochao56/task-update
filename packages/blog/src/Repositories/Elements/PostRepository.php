<?php

namespace QH\Blog\Repositories\Elements;

use Illuminate\Support\Facades\File;
use QH\Blog\Models\Post;
use QH\Blog\Repositories\Interface\PostRepositoryInterface;
use QH\Core\Base\Repository\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{

    public function getModel()
    {
        return Post::class;
    }

    public function getAllPosts()
    {

        if(\Auth::user()->role === 'admin'){
            return $this->model->with('user')->orderBy('updated_at', 'DESC')->paginate(5);
        }
        return $this->model->with('user')
            ->where('user_id',\Auth::user()->id)
            ->orderBy('updated_at', 'DESC')->paginate(3);
    }

    public function getSomePosts(){
        return $this->model->with('user')->where('status', 'active')->orderBy('updated_at', 'DESC')->paginate(3);
    }

    public function getPostBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function updatePost($slug, $data)
    {
        return $this->model->where('slug', $slug)->update($data);
    }

    public function deletePost($slug)
    {
        $post = $this->model->where('slug', $slug)->first();
        $thumbnailPath = public_path('/qh/blog/images/'.$post->thumb);
        if (File::exists($thumbnailPath)) {
            try {
                unlink($thumbnailPath);
                // File deletion successful
            } catch (\Exception $e) {
                \Log::error('Error deleting thumbnail: ' . $e->getMessage());
            }
        } else {
            \Log::error('File not found: ' . $thumbnailPath);
        }
        return $post->delete();
    }

}
