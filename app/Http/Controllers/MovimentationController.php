<?php

namespace App\Http\Controllers;

use App\Models\Movimentation;
use App\Http\Requests\Movimentation\StoreMovimentationRequest;

class MovimentationController extends Controller
{
    private $saldo;

    public function index()
    {
        return view('admin.pages.movimentations.index', ['saldo' => $this->saldo(), 'movimentations' => Movimentation::select()->orderByDesc('created_at')->simplePaginate(4)]);
    }

    public function create()
    {
        return view('admin.pages.movimentations.create');
    }

    public function store(StoreMovimentationRequest $request)
    {
        $movimentation = new Movimentation();
        $movimentation->type_movimentation = $request->type;
        $movimentation->value_movimentation = $request->value;
        $movimentation->description_movimentation = $request->description;
        $movimentation->save();
        return redirect()->route('movimentations.index');
    }

    public function destroy($id)
    {
        if (auth()->user()->admin_user == 1) {
            Movimentation::destroy($id);
        }
        return redirect()->route('movimentations.index');
    }
    public function saldo()
    {
        $movimentations = Movimentation::all();
        foreach ($movimentations as $movimentation) {
            if ($movimentation->type_movimentation == '1') {
                $this->saldo =  $this->saldo + (float)$movimentation->value_movimentation;
            } else {
                $this->saldo =  $this->saldo - (float)$movimentation->value_movimentation;
            }
        }
        return $this->saldo;
    }
}
