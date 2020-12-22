<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\Client\EditClientRequest;
class ClientController extends Controller
{
    public function index()
    {
        return view('admin.pages.client.index', ['clients' => Client::select()->orderBy('name_client')->simplePaginate(4)]);
    }

    public function create()
    {
        return view('admin.pages.client.create');
    }

    public function store(EditClientRequest $request)
    {
        $client = new Client;
        $client->name_client = $request->name;
        $client->email_client = $request->email;
        $client->phone_client = $request->phone;
        $client->cpf_client = $request->cpf;
        $client->save();
        return redirect()->route('clients.index');
    }

    public function show($id)
    {
        return redirect()->route('clients.index');
    }

    public function edit($id)
    {
        return view('admin.pages.client.edit', ['client' => Client::where('id_client', $id)->get()]);
    }

    public function update(EditClientRequest $request, $id)
    {
        if (auth()->user()->admin_user == 1) {
            $client = Client::find($id);
            $client->name_client = $request->name;
            $client->email_client = $request->email;
            $client->phone_client = $request->phone;
            $client->cpf_client = $request->cpf;
            $client->save();
        }
        return redirect()->route('clients.index');
    }

    public function destroy($id)
    {
        if (auth()->user()->admin_user == 1) {
            Client::destroy($id);
        }
        return redirect()->route('clients.index');
    }
    public function find(Request $request)
    {
        $request->validate(['name' => 'required']);
        $clients = Client::where('name_client', 'LIKE', $request->name . '%')->simplePaginate(4);
        return view('admin.pages.client.index', ['clients' => $clients]);
    }
}
