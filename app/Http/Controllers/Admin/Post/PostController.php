<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\CreateRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Service\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public $service;

    public function __construct(PostService $service)
    {
            $this->service = $service;
    }

    public function index(){

        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }
    public function create(){
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.post.create',compact('categories','tags'));
    }

    public function store(CreateRequest $request){

        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }


    public function edit(Post $post){


        $categories = Category::all();
        $tags = Tag::all();


        return view('admin.post.edit',compact('post','categories','tags'));
    }

    public function update(UpdateRequest $request, Post $post){

        $data = $request->validated();
        $post = $this->service->update($data,$post);

        return view('admin.post.show',compact('post'));
    }


    public function delete(Post $post){
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
