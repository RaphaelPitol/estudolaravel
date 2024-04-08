<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $products = Product::get();

    // dd($products);
    return view(
      'products.index',
      ['products' => $products]
    );
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    // dd('Chegou');
    return view('products.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    
    $dados = $request->except('_token');
    // dd($dados);
    Product::create($dados);

    return redirect('/products');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
   
    $product = Product::find($id);
    // dd($product);

    return view('products.show', [
      'product'=> $product
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
    $product = Product::find($id);
    // dd($product);

    return view('products.edit', [
      'product'=> $product
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $product = Product::find($id);
    $product->update([
      'nome'=> $request->nome,
      'qtd_product'=> $request->qtd_product,
      'preco'=> $request->preco,
    ]);

    return redirect('/products');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $product = Product::find($id);
    $product->delete();
    return redirect('/products');

  }
}
