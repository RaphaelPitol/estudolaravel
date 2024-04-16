<?php

namespace App\Http\Controllers;

use App\Models\FeatureFlag;
use Illuminate\Http\Request;

class FeatureFlagController extends Controller
{
  public function index()
  {
    $features = FeatureFlag::get();
    // dd($features);

    return view('features.index',['features'=> $features]);
    
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('features.create');
      
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $dados = $request->except('_token');

    FeatureFlag::create($dados);

      return redirect('/feature');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
      //
     
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $feature = FeatureFlag::find($id);

    return view('features.edit', [
      "feature"=> $feature
    ]);
     
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $feature = FeatureFlag::find($id);
    $feature->update([
      'chave' => $request->chave,
      'valor' => $request->valor,
      'descricao' => $request->descricao
    ]);

    return redirect('/feature');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
      //
  }
}
