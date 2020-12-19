<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lead;
use App\Http\Requests\User\EditUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {    
        return view('admin.pages.user.index', ['MyUser' =>'','MyUserPhoto' => 0,'users' => User::select()->orderByDesc('id_user')->simplePaginate(5)]);
    }

    public function create()
    {
        return view('admin.pages.user.create',['MyUser' =>'','MyUserPhoto' => 0]);
    }

    public function store(StoreUserRequest $request)
    {
        $user = new User;
        $user->name_user = $request->name;
        $user->email_user = $request->email;
        $user->admin_user = (int)$request->admin;
        $user->password_user = bcrypt($request->password);
        $user->save();
        return redirect()->route('users.index');
    }

    public function find(Request $request)
    {
        $request->validate(['name' => 'required']);
        $users = User::where('name_user','LIKE', $request->name.'%')->simplePaginate(5);
        return view('admin.pages.user.index', ['MyUser' =>'','MyUserPhoto' => 0,'users' => $users]);
    }
    public function show($id){
        return redirect()->route('users.index');
    }
    public function edit($id){
        return view('admin.pages.user.edit',['MyUser' =>'','MyUserPhoto' => 0,'user' =>User::where('id_user', $id)->get()]);
    }

    public function update(EditUserRequest $request, $id)
    {
        if(auth()->user()->admin_user == 1){
            $user = User::find($id);
            $user->name_user = $request->name;
            $user->admin_user = (int)$request->admin;
            $user->save();
        }
       
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if(auth()->user()->admin_user == 1){
            User::destroy($id);
        }
        return redirect()->route('users.index');
    }
    public function main()
    {
        $data = Lead::stats();
        return view('admin.pages.user.main', ['MyUser' =>'','MyUserPhoto' => 0, 'day' => $data['day'], 'month' => $data['month'], 'year' => $data['year'], 'all' => $data['all']]);
    }
    
}
