<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class BattleController extends Controller
{
  public function index()
  {
    
    // $response = Http::withOptions(['verify' => false])->get("https://pokeapi.co/api/v2/pokemon?limit=151");
      // dd($response->json());
    $data = $this->getPokemonsList();
      
      // dd($data);
  
      // foreach($data as $client){
      //   dd($client['name']);
      // }
  
      // return view('pokeapi.list',[
      //   'data' => $data

    return view('pokeapi.index', [
      'data' => $data
    ]);
    //
  }

  public function battle(Request $request)
  {
    // dd($request->option1);
    $pokemon1_name = $request->option1;
    $pokemon2_name = $request->option2;

    $pokemon1_data = $this->getPokemonData($pokemon1_name);
    $pokemon2_data = $this->getPokemonData($pokemon2_name);

    if (!$pokemon1_data || !$pokemon2_data) {
      
      $erro = "Um dos nomes de Pokémon é inválido.";
          return view('pokeapi.index',[
            "erro" => $erro
          ]);
    }

    // dd($pokemon1_data,  $pokemon2_data);
    $pokemon1_attack = $pokemon1_data['stats'][1]['base_stat'];
    $pokemon2_attack = $pokemon2_data['stats'][1]['base_stat'];

    if ($pokemon1_attack > $pokemon2_attack) {
      $pokemon1_name = ucfirst($pokemon1_name);
      $result = "$pokemon1_name é o vencedor";
    } elseif ($pokemon2_attack > $pokemon1_attack) {
      $pokemon2_name = ucfirst($pokemon2_name);
      $result = "$pokemon2_name é o vencedor";
    } else {
      $result = "Deu empate!";
    }

    $data = $this->getPokemonsList();
    return view('pokeapi.index',[
      "result" => $result,
      "data" => $data
    ]);
  }

  private function getPokemonData($pokemon_name)
  {
    $response = Http::withOptions(['verify' => false])->get("https://pokeapi.co/api/v2/pokemon/{$pokemon_name}");

    if ($response->successful()) {
      return $response->json();
    } else {
      return null;
    }
  }

  public function getPokemonsList(){
    $response = Http::withOptions(['verify' => false])->get("https://pokeapi.co/api/v2/pokemon?limit=151");
    // dd($response->json());
   return $response->json()['results'];
    // dd($data);

    // foreach($data as $client){
    //   dd($client['name']);
    // }

    // return view('pokeapi.list',[
    //   'data' => $data
    // ]);
  }
}
