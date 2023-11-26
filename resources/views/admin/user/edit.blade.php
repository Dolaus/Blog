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

                    <form action="{{route('admin.user.update',$user->id)}}" method="POST" class="w-25">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Назва</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}" >
                            @error('title')
                                <div class="text-danger">{{@$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Емайл</label>
                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{$user->email}}">
                            @error('email')
                            <div class="text-danger">{{@$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Категорії</label>
                            <select name="role">
                                @foreach($roles as $id => $role)
                                    <option {{$user->role == $id ? 'selected':' '}} value="{{$id}}">{{$role}}</option>
                                @endforeach

                            </select>
                            @error('category_id')
                            <div class="text-danger">{{@$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Змінити">
                    </form>
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
