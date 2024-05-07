<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Mockery\Undefined;

class BuscaCepController extends Controller
{
  public function consultacep(Request $request){

    $cep = $request->input('cep');
        
        $response = Http::withOptions(['verify' => false])->get('https://viacep.com.br/ws/' . $cep . '/json');
       
        
        $endereco = $response->json();
        
        // dd($endereco);
    
        return view('cep.index',[
          "endereco" => $endereco
        ]);
  }
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
      return view('cep.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
