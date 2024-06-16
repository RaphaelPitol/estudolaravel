<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\FeatureFlag;
use Illuminate\Http\Request;

class ClientController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $feature = FeatureFlag::find(1);

    $clients = Client::get();
    // foreach($clients as $client){
    //   dd($client->nome);
    // }

    // echo(var_dump($feature->valor));
    // dd("teste");

    return view(
      'clients.index',
      [
        'clients' => $clients,
        'feature'=> $feature
      ]
    );
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $feature = FeatureFlag::find(1);
    // dd($feature);
    return view(
      'clients.create',
      ['feature'=> $feature]
    );
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //except deleta o token
    $dados = $request->except('_token');
    //  dd($dados);
    Client::create($dados);

    return redirect('/');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $client = Client::find($id);

    return view(
      'clients.show',
      [
        'client' => $client
      ]
    );
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    // dd($id);
    $client = Client::find($id);

    return view(
      'clients.edit',
      [
        'client' => $client
      ]
    );
  }

  /**
   * Update the specified resource in storage.
   */
  //a request é oque vem do formulario
  public function update(Request $request, string $id)
  {
    //busca o cliente pelo id
    $client = Client::find($id);
    $client->update([
      'nome' => $request->nome,
      'endereco' => $request->endereco,
      'observacao' => $request->observacao
    ]);

    return redirect('/');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $client = Client::find($id);
    $client->delete();
    return redirect('/');
  }
}
