<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Agendamento;


class AgendamentoController extends Controller
{
    function create(Request $request){
        $request->validate([
            'Nome'=>'required',
            'Telefone'=>'required',
            'Origem'=>'required',
            'DataContato'=>'required',
            'Obervacao'=>'required'
        ]);
        $query = DB::table('servico')->insert([
            'Nome'=>$request->input('Nome'),
            'Telefone'=>$request->input('Telefone'),
            'Origem'=>$request->input('Origem'),
            'DataContato'=>$request->input('DataContato'),
            'Obervacao'=>$request->input('Obervacao')
        ]);
        
    }
    public function listar()
    {
        $data = array(
            'listar' =>DB::table('servico')->get()

        );
        return view('consultar', $data);
    }
}