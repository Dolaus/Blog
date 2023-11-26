<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public  function  store($data){
        $tagsId = $data['tag_ids'];
        unset($data['tag_ids']);

        $data['preview_image'] =  Storage::disk('public')->put('/images',$data['preview_image']);
        $data['main_image'] =  Storage::disk('public')->put('/images',$data['main_image']);


        $post = Post::create($data);
        $post->tags()->attach($tagsId);
    }

    public function update($data,Post $post): Post {

        $tagsId = $data['tag_ids'];
        unset($data['tag_ids']);

        if (array_key_exists('preview_image',$data)){
            $data['preview_image'] =  Storage::disk('public')->put('/images',$data['preview_image']);
        }
        if (array_key_exists('preview_image',$data)) {
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        }
        $post->update($data);
        $post->tags()->sync($tagsId);

        return $post;
    }
}
