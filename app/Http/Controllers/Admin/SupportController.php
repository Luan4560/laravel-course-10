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
      return redirect()->back();
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
}
