<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Exception;

class categoryController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::all();
            return view('categories.index', compact('categories'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.category.load_error', ['error' => $e->getMessage()]));
        }
    }

    public function create()
    {
        try {
            $options = Category::pluck('name', 'id')->toArray();
            $options = [null => 'Ninguna categoría'] + $options;

            $fields = [
                [
                    'type' => 'text',
                    'name' => 'name',
                    'label' => 'Nombre',
                    'placeholder' => 'Ingrese el nombre',
                ],
                [
                    'type' => 'select',
                    'name' => 'parent_id',
                    'label' => 'Categoría',
                    'options' => $options,
                ],
            ];

            return view('categories.create', compact('fields'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.category.load_error', ['error' => $e->getMessage()]));
        }
    }

    public function store(CategoryRequest $request)
    {
        try {
            $validatedData = $request->validated();

            if ($validatedData['parent_id'] != null) {
                $parentCategory = Category::find($validatedData['parent_id']);
                if (!$parentCategory) {
                    return redirect()->back()->withInput()->withErrors(['parent_id' => 'Categoría padre no encontrada.']);
                }
            }

            Category::create($validatedData);

            return redirect()->route('categories.index')->with('create', __('messages.category.created'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.category.create_error', ['error' => $e->getMessage()]));
        }
    }


    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());
            return redirect()->route('categories.index')->with('edit', __('messages.category.updated'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.category.update_error', ['error' => $e->getMessage()]));
        }
    }

    public function edit(Category $category)
    {
        try {
            $options = Category::pluck('name', 'id')->toArray();
            $options = [null => 'Ninguna categoría'] + $options;

            $fields = [
                [
                    'type' => 'text',
                    'name' => 'name',
                    'label' => 'Nombre',
                    'placeholder' => 'Ingrese el nombre',
                ],
                [
                    'type' => 'select',
                    'name' => 'parent_id',
                    'label' => 'Categoría',
                    'options' => $options,
                ],
            ];
            return view('categories.edit', compact('category', 'fields'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.category.load_error', ['error' => $e->getMessage()]));
        }
    }

    public function  destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')->with('delete', __('messages.category.deleted'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('messages.brand.delete_error', ['error' => $e->getMessage()]));
        }
    }
}
