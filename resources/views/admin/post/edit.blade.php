@extends('admin.layouts.main')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Створення категорії</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-12">

                    <form action="{{route('admin.post.update',$post->id)}}" method="POST" class="w-50" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group w-25">
                            <label>Назва</label>
                            <input type="text" name="title" class="form-control" placeholder="Назва категорії"
                                   value="{{$post->title}}">

                            @error('title')
                            <div class="text-danger">{{@$message}}</div>
                            @enderror


                        </div>
                        <div class="form-group">
                            <textarea id="summernote" name="content">{{$post->content}} </textarea>
                            @error('content')
                            <div class="text-danger">{{@$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group w-50">
                            <label for="exampleInputFile">File input
                                <div class="w-25">
                                    <img src="{{asset('storage/'.$post->main_image)}}" alt="fsdsdfsdf">
                                </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                           name="main_image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="w-50">
                                <img src="{{asset('storage/'.$post->preview_image) }}" alt="sdfsdfs">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                           name="preview_image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Категорії</label>
                            <select name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach

                            </select>
                            @error('category_id')
                            <div class="text-danger">{{@$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Теги</label>
                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Вибрати теги"
                                    style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option {{is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id,$post->tags->pluck('id')->toArray()) ?'selected':' ' }} value="{{ $tag->id }}">{{$tag->title}}</option>
                                @endforeach
                            </select>
                            @error('tag_ids')
                            <div class="text-danger">{{@$message}}</div>
                            @enderror
                        </div>



                        <input type="submit" class="btn btn-primary" value="Змінити">
                    </form>
                </div>

            </div>
            <!-- /.row -->
            <div>
                @error('tag_ids')
                <div class="text-danger">{{@$message}}</div>
                @enderror
                @error('category_id')
                <div class="text-danger">{{@$message}}</div>
                @enderror
                @error('preview_image')
                <div class="text-danger">{{@$message}}</div>
                @enderror
                @error('main_image')
                <div class="text-danger">{{@$message}}</div>
                @enderror
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
