<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lead;
use App\Http\Requests\User\EditUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\SetPhotoRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;



class UserController extends Controller
{
    public function index()
    {
        return view('admin.pages.user.index', ['users' => User::select()->orderByDesc('id_user')->simplePaginate(5)]);
    }

    public function create()
    {
        return view('admin.pages.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = new User;
        $user->name_user = $request->name;
        $user->email_user = $request->email;
        $user->admin_user = (int)$request->admin;
        $user->password_user = bcrypt($request->password);
        $user->photo_user = 'default.png';
        $user->save();
        return redirect()->route('users.index');
    }

    public function find(Request $request)
    {
        $request->validate(['name' => 'required']);
        $users = User::where('name_user', 'LIKE', $request->name . '%')->simplePaginate(5);
        return view('admin.pages.user.index', ['users' => $users]);
    }
    public function show($id)
    {
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        return view('admin.pages.user.edit', ['user' => User::where('id_user', $id)->get()]);
    }

    public function update(EditUserRequest $request, $id)
    {
        if (auth()->user()->admin_user == 1) {
            $user = User::find($id);
            $user->name_user = $request->name;
            $user->admin_user = (int)$request->admin;
            $user->save();
        }

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if (auth()->user()->admin_user == 1) {
            User::destroy($id);
        }
        return redirect()->route('users.index');
    }
    public function main()
    {
        $data = Lead::stats();
        return view('admin.pages.user.main', ['day' => $data['day'], 'month' => $data['month'], 'year' => $data['year'], 'all' => $data['all']]);
    }
    public function profile()
    {
        return view('admin.pages.profile.index');
    }
    public function photo()
    {
        return view('admin.pages.profile.photo');
    }

    public function setPhoto(SetPhotoRequest $request)
    {
        /*
        Salvar Imagem
        */
        $image = $request->file('img');
        $filename = $image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $destinationPath = public_path('assets\img\avatars');
        $image_resize->save($destinationPath . '/' . $filename);
        /*
        Imagem Salva
        */

        /*
        Atualizar nome da imagem no banco
        */
        $user = User::find(auth()->user()->id_user);
        if($user->photo_user != 'default.png'){
            unlink($destinationPath .'/'. $user->photo_user);
        }
        $user->photo_user = $filename;
        $user->save();
        return redirect()->route('main');
    }

    public function deletePhoto(){
        $user = User::find(auth()->user()->id_user);
        $destinationPath = public_path('assets\img\avatars');
        if($user->photo_user != 'default.png'){
            unlink($destinationPath .'/'. $user->photo_user);
        }
        $user->photo_user = "default.png";
        $user->save();
        return redirect()->route('main');
    }
}
