<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transacao;
use App\Categoria;
use App\User;
use Illuminate\Support\Facades\Auth;

class TransacaoController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transacao.index')->with('user',User::find(Auth::user()->id))
        ->with('transacoes',Transacao::orderBy('data')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      if($request->has('gasto')){
        return view('transacao.createGasto')->with('categorias',Categoria::all())->with('user',User::find(Auth::user()->id));
      }else {
        return view('transacao.createRenda')->with('categorias',Categoria::all())->with('user',User::find(Auth::user()->id));
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $t = new Transacao;
      $t->user_id = Auth::user()->id;
      if($request->has('gasto'))
        $t->tipo = 1;
      else $t->tipo = 0;

      $t->fill($request->all());
      $t->save();

      return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $transacao = Transacao::find($id);
      if($transacao->tipo==1){
        return view('transacao.editGasto')->with('categorias',Categoria::all())->with('user',User::find(Auth::user()->id))
        ->with('transacao',$transacao);
      }else {
        return view('transacao.editRenda')->with('categorias',Categoria::all())->with('user',User::find(Auth::user()->id))
        ->with('transacao',$transacao);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transacao = Transacao::find($id);
        $transacao->fill($request->all());
        $transacao->save();

        return redirect()->route('transacao.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transacao = Transacao::find($id);
        $transacao->delete();
        return redirect()->route('transacao.index');
    }
}
