<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\CreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('admin.post.create');
    }

    public function store(CreateRequest $request){
        $data = $request->validated();
        Post::create($data);
    }
}
