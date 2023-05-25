<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
  // Injeção de dependencia, cria variavel $support e injeta o objeto de
  // Support na variavel
  public function index(Support $support)
  {
    // recupera a collection no db
    $supports = $support->all();


    return view('admin/supports/index', compact('supports'));
  }

  public function show(string|int $id)
  {

    if (!$support = Support::find($id)) {
      return back();
    }

    return view('admin/supports/show', compact('support'));
  }

  public function create()
  {
    return view('admin/supports/create');
  }

  // Acessando dados do formulário após envio
  public function store(Request $request, Support $support)
  {
    $data = $request->all();
    $data['status'] = 'a';

    $support->create($data);

    return redirect()->route('supports.index');
  }

  // Metodo que busca no banco support para ser editado e retorna a view 
  // para o formulárdio de edição
  public function edit(Support $support, string|int $id)
  {
    if (!$support = $support->where('id', $id)->first()) {
      return back();
    }

    return view('admin/supports.edit', compact('support'));
  }

  // Metodo para atualizar o support no banco, buscando pelo id e editando 
  // itens especificos como subject e body
  public function update(Request $request, Support $support, string|int $id)
  {
    if (!$support = $support->find($id)) {
      return back();
    }

    $support->update($request->only([
      'subject', 'body'
    ]));

    return redirect()->route('supports.index');
  }

  public function destroy(Support $support, string|int $id)
  {
    if (!$support = $support->find($id)) {
      return back();
    }

    $support->delete();

    return redirect()->route('supports.index');
  }
}
