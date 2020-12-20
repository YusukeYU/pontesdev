<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\Service\EditServiceRequest;

class ServiceController extends Controller
{

    public function index()
    {
        return view('admin.pages.service.index', ['MyUser' => '', 'MyUserPhoto' => 0, 'services' => Service::select()->orderBy('name_service')->simplePaginate(4)]);
    }

    public function create()
    {
        return view('admin.pages.service.create', ['MyUser' => '', 'MyUserPhoto' => 0]);
    }

    public function store(EditServiceRequest $request)
    {
        $service = new Service;
        $service->name_service = $request->name;
        $service->price_service = (float)$request->price;
        $service->description_service = $request->description;
        $service->save();
        return redirect()->route('services.index');
    }
    public function find(Request $request)
    {
        $request->validate(['name' => 'required']);
        $services = Service::where('name_service','LIKE', $request->name.'%')->simplePaginate(5);
        return view('admin.pages.service.index', ['MyUser' =>'','MyUserPhoto' => 0,'services' => $services]);
    }
    public function show($id)
    {
        return redirect()->route('services.index');
    }
    public function edit($id)
    {
        return view('admin.pages.service.edit', ['MyUser' => '', 'MyUserPhoto' => 0, 'service' => Service::where('id_service', $id)->get()]);
    }
    public function update(EditServiceRequest $request, $id)
    {
        $service = Service::find($id);
        $service->name_service = $request->name;
        $service->price_service = (float)$request->price;
        $service->description_service = $request->description;
        $service->save();
        return redirect()->route('services.index');
    }

    public function destroy($id)
    {
        if (auth()->user()->admin_user == 1) {
            Service::destroy($id);
        }
        return redirect()->route('services.index');
    }
}
