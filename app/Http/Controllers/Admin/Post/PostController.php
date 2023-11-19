<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\CreateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
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

        $tagsId = $data['tag_ids'];
        unset($data['tag_ids']);

        $data['preview_image'] =  Storage::put('/images',$data['preview_image']);
        $data['main_image'] =  Storage::put('/images',$data['main_image']);


        $post = Post::create($data);
        $post->tags()->attach($tagsId);
        return redirect()->route('admin.post.index');
    }
}
