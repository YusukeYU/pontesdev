<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Http\Requests\Lead\StoreLeadRequest;

class LeadController extends Controller
{
    public function index()
    {
        return view('admin.pages.lead.index', ['MyUser' =>'','MyUserPhoto' => 0,'leads' => Lead::select()->orderByDesc('created_at')->simplePaginate(4)]);
    }

    public function store(StoreLeadRequest $request)
    {
        try {
        $lead = new Lead;
        $lead->name_lead = $request->name;
        $lead->email_lead = $request->email;
        $lead->phone_lead = $request->phone;
        $lead->msg_lead = $request->msg;
        $lead->save();
        return response(['retorno' => "Mensagem recebida, aguarde o retorno!"], 200);
        }
        catch (\Exception $ex) {
            return response($ex->getmessage(), 400);
        }

    }
    public function find(Request $request)
    {
        $request->validate(['name' => 'required']);
        $leads = Lead::where('name_lead','LIKE', $request->name.'%')->simplePaginate(5);
        return view('admin.pages.lead.index', ['MyUser' =>'','MyUserPhoto' => 0,'leads' => $leads]);
    }
    public function show($id){
        return redirect()->route('leads.index');
    }
    public function destroy($id)
    {
        Lead::destroy($id);
        return redirect()->route('leads.index');
    }
}
