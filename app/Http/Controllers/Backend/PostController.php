<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PhotoUploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PostCreateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $posts = Post::with('category', 'sub_category', 'user', 'tag')->latest()->paginate(20);
       return view('backend.modules.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->pluck('name', 'id');
        $tags = Tag::where('status', 1)->select('name', 'id')->get();
        return view('backend.modules.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
      $post_data = $request->except(['slug', 'tag_ids', 'photo']);
      $post_data['slug'] = Str::slug($request->input('slug'));
      $post_data['user_id'] = Auth::user()->id;
      $post_data['is_approved'] =1;

      if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = Str::slug($request->input('slug'));
            $height = 600;
            $width = 1000;
            $thamb_height = 150;
            $thumb_widht =150;

            $path = 'image/post/original/';
            $thmb_path = 'image/post/thumbnail/';

           $post_data['photo'] = PhotoUploadController::imageUpload($name, $height, $width, $path, $file);
           PhotoUploadController::imageUpload($name, $thamb_height, $thumb_widht, $thmb_path, $file);


           $post = Post::create($post_data);

           $post->tag()->attach($request->input('tag_ids'));


      }

      
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('category', 'sub_category', 'user', 'tag');
        return view('backend.modules.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
       
        $categories = Category::where('status', 1)->pluck('name', 'id');
        $sub_category = SubCategory::where('status', 1)->where('category_id', $post->category_id)->pluck('name', 'id');
        $tags = Tag::where('status', 1)->select('name', 'id')->get();

        return view('backend.modules.post.edit', compact('post', 'tags', 'categories', 'sub_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('cls', 'danger');
        session()->flash('msg', 'Post deleted Successfully');
        return redirect()->route('post.index');
    }
}
