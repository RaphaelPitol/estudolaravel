<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BattleController extends Controller
{
  public function index()
  {
    return view('pokeapi.index');
    //
  }

  public function battle(Request $request)
  {
    $pokemon1_name = $request->input('pokemon1');
    $pokemon2_name = $request->input('pokemon2');

    $pokemon1_data = $this->getPokemonData($pokemon1_name);
    $pokemon2_data = $this->getPokemonData($pokemon2_name);

    if (!$pokemon1_data || !$pokemon2_data) {
      
      $erro = "Um dos nomes de Pokémon é inválido.";
          return view('pokeapi.index',[
            "erro" => $erro
          ]);
    }

    $pokemon1_attack = $pokemon1_data['stats'][1]['base_stat'];
    $pokemon2_attack = $pokemon2_data['stats'][1]['base_stat'];

    if ($pokemon1_attack > $pokemon2_attack) {
      $result = "$pokemon1_name é o vencedor";
    } elseif ($pokemon2_attack > $pokemon1_attack) {
      $result = "$pokemon2_name é o vencedor";
    } else {
      $result = "Deu empate!";
    }

    return view('pokeapi.index',[
      "result" => $result
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
}
