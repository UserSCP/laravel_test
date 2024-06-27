<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Exception;


class ProductsController extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();
            $route = route('products.create');
            return view('products.index', compact('products', 'route'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.product.load_error',['error'=>$e->getMessage()]));
        }
    }
    public function create()
    {
        try{
            $fields = [
                [
                    'type' => 'text',
                    'name' => 'name',
                    'label' => 'Nombre',
                    'placeholder' => 'Ingrese el nombre',
                ],
                [
                    'type' => 'text',
                    'name' => 'price',
                    'label' => 'Precio',
                    'placeholder' => 'Ingrese el precio',
                ],
                
            ];
        return view('products.create', compact('fields'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('error',__('messages.product.load_error',['error'=>$e->getMessage()]));
        }
    }

    public function store(ProductRequest $request)
    {
        try {
            $validated = $request->validated();
            Product::create([
                'name' => $validated['name'],
                'price' => $validated['price'],
            ]);
            return redirect()->route('products.index')->with('create', __('messages.product.created'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.product.create_error',['error'=>$e->getMessage()]));
        }
    }

    public function edit(Product $product)
    {
        try {
                $fields = [
                    [
                        'type' => 'text',
                        'name' => 'name',
                        'label' => 'Nombre',
                        'placeholder' => 'Ingrese el nombre',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'price',
                        'label' => 'Precio',
                        'placeholder' => 'Ingrese el precio',
                    ],
                ];
            return view('products.edit', compact('product','fields'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.product.load_error',['error'=>$e->getMessage()]));
        }
    }

    public function update(ProductRequest $request, Product $product)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:100',
                'price' => 'required|numeric',
            ]);
            $product->update($validated);
            return redirect()->route('products.index')->with('edit', __('messages.product.updated'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.product.update_error',['error'=>$e->getMessage()]));
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')->with('delete', __('messages.product.deleted'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.product.delete_error',['error'=>$e->getMessage()]));
            
        }
    }
}
