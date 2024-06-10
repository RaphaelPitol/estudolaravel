@extends('layouts.app')
@section('title', 'Batalha de Pokemon')
@section('content')

<h1>Pokémon Battle</h1>
<form action="{{route('battle')}}" method="post">
  @csrf
  <div class="form-group mx-sm-3 mb-2">
    <label for="pokemon1">1º Pokémon:</label>
    <input type="text" class="form-control" id="pokemon1" name="pokemon1" required>
  
  <label for="pokemon2">2º Pokémon:</label>
  <input type="text" class="form-control" id="pokemon2" name="pokemon2" required>
  </div>
 
  <br>
  <button type="submit" class="btn btn-primary mb-2">Battle!</button>
</form>

@if (isset($erro))
<div class="alert alert-danger">
  <ul>
    <li>{{ $erro }}</li>
  </ul>
</div>
@endif

@if(!empty($result))
<div class="car-body">
  <h2>{{$result}}</h2>
  <br>
</div>
@endif

@endsection