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
        if (\Auth::check()) {
            $posts = $this->postRepository->getAllPosts();
        return view('blog.user.index')
            ->with('posts', $posts);
        }else{
            return redirect()->route('user.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.user.create');
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
        return redirect()->route("user.blog.");
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = $this->postRepository->getPostBySlug($slug);
        return view('blog.user.show')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $post = $this->postRepository->getPostBySlug($slug);
        return view('blog.user.edit')
            ->with('post', $post);
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
        ]);
        try {
            $data = $this->postService->updatePost($request);
            $this->postRepository->updatePost($slug, $data);
            session()->flash('success', 'Update the post successfully');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("user.blog.");
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
        return redirect()->route("user.blog.");
    }
}
