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
    $feature = FeatureFlag::find(2);
    $clients = Client::get();
    // foreach($clients as $client){
    //   dd($client->nome);
    // }

    // echo(var_dump($feature->valor));
    // dd("teste");
    if($feature->valor == 0){
      return view('login.login');
    }

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
    $feature = FeatureFlag::find(2);
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

    return redirect('/clients');
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

    return redirect('/clients');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $client = Client::find($id);
    $client->delete();
    return redirect('/clients');
  }
}
