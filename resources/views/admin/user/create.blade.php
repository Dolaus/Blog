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

                    <form action="{{route('admin.user.store')}}" method="POST" class="w-25">
                        @csrf
                        <div class="form-group">
                            <label>Ім'я</label>
                            <input type="text" name="name" class="form-control" placeholder="Ім'я">
                            @error('name')
                                <div class="text-danger">{{@$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Емайл</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                            @error('email')
                            <div class="text-danger">{{@$message}}</div>
                            @enderror
                        </div>





                        <div class="form-group">
                            <label>Роль</label>

                            <select name="role">
                                @foreach($roles as $id => $role)
                                    <option value="{{$id}}">{{$role}}</option>
                                @endforeach

                            </select>
                            @error('title')
                            <div class="text-danger">{{@$message}}</div>
                            @enderror
                        </div>






                        <input type="submit" class="btn btn-primary" value="Добавити">
                    </form>
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
