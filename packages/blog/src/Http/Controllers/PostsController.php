<?php

namespace QH\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use QH\Blog\Http\Services\PostsService;
use QH\Blog\Models\Post;
use QH\Blog\Repositories\Interface\PostRepositoryInterface;

class PostsController extends Controller
{
    protected $postRepository;
    protected $postService;

    public function __construct(PostsService $postService, PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->postService = $postService;
//        $this->middleware('auth',['except'=>['/user/blog/index','/user/blog/show']]);
    }

    public function dashboard()
    {
        $posts = $this->postRepository->getSomePosts();
        return view('blog.index')
            ->with('posts', $posts);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postRepository->getAllPostsA();
        return view('admin.blog.index', [
            'title' => "Danh sách bài viết",
            "posts" => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create', [
            'title' => "Tạo bài viết"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts',
            'description' => 'required',
            'content' => 'required',
            'thumb' => 'required|mimes:jpg,png,jpeg|max:5048',
            'status' => 'required'
        ]);
        try {
            $data = $this->postService->storePost($request);
            $this->postRepository->create($data);
            session()->flash('success', 'Create the post successfully');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.blogs.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = $this->postRepository->getPostBySlug($slug);
        return view('blog.show')->with('post',$post);
    }

    public function showAdmin($slug)
    {
        $post = $this->postRepository->getPostBySlug($slug);
        return view('admin.blog.show', [
            'title' => "Bài viết",
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $post = $this->postRepository->getPostBySlug($slug);
        return view('admin.blog.edit',[
        'title' => "Sửa bài viết",
            "post" => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'title' => 'required|unique:posts,title,' . $slug . ',slug',
            'content' => 'required',
            'status' => 'required',
            'description' => 'required',
            'author_name' => 'required'
        ]);
        try {
            $data = $this->postService->updatePost($request);
            $this->postRepository->updatePost($slug, $data);
            session()->flash('success', 'Update the post successfully');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.blogs.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        try {
            $this->postRepository->deletePost($slug);
            session()->flash('success', 'Delete the post successfully');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.blogs.index");
    }
}
