<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Exception;

class BrandController extends Controller
{
    public function index()
    {
        try {
            $brands = Brand::all();
            $route = route('brands.create');
            return view('brands.index', compact('brands', 'route'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.brand.load_error', ['error' => $e->getMessage()]));
        }
    }

    public function create()
    {
        try{
        $fields = [
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Nombre',
                'placeholder' => 'Ingrese el nombre',
            ],
            ];
        return view('brands.create',compact('fields'));
    }catch(Exception $e)
    {
        return redirect()->back()->with('error',__('messages.brand.load_error',['error'=>$e->getMessage()]));
    }
    }

    public function store(BrandRequest $request)
    {
        try {
            $validated = $request->validated();
            Brand::create([
                'name' => $validated['name'],
            ]);
            return redirect()->route('brands.index')->with('create', __('messages.brand.created'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.brand.create_error',['error'=>$e->getMessage()]));
        }
    }

    public function edit(Brand $brand)
    {
        try{
            $fields = [
                [
                    'name' => 'name',
                    'type' => 'text',
                    'label' => 'Nombre',
                    'placeholder' => 'Ingrese el nombre',
                ],
                ];
        return view('brands.edit', compact('brand','fields'));
        }catch (Exception $e) {
            return redirect()->back()->with('error',__('messages.brand.load_error',['error'=>$e->getMessage()]));
        }
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        try{
        $validated = $request->validated();  
        $brand->update($validated);
        return redirect()->route('brands.index')->with('edit',__('messages.brand.updated'));
        }catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.brand.update_error',['error'=>$e->getMessage()]));
        }
    }

    public function destroy(Brand $brand)
    {
        try{
        $brand->delete();
        return redirect()->route('brands.index')->with('delete', __('messages.brand.deleted'));
        }catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.brand.delete_error',['error'=>$e->getMessage()]));
        }
    }
}
