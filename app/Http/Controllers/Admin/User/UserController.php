<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Mail\User\PasswordMail;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Service\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{


    public function __construct()
    {
    }

    public function index(){

        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
    public function create(){
        $roles = User::getRoles();
        return view('admin.user.create',compact('roles'));
    }

    public function store(CreateRequest $request){

        $data = $request->validated();

        $password = Str::random(10);

        $data['password'] = Hash::make($password);

        User::firstOrCreate(['email'=>$data['email']],$data);
        Mail::to($data['email'])->send(new PasswordMail($password));
        return redirect()->route('admin.user.index');
    }


    public function edit(User $user){

        $roles = User::getRoles();

        return view('admin.user.edit',compact('user','roles'));
    }

    public function update(UpdateRequest $request, User $user){

        $data = $request->validated();

        $user->update($data);
        return view('admin.user.show',compact('user'));
    }


    public function delete(User $user){
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
