<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::paginate(10);
        return view('admin.category.index', ['categories' => $categories]);
    }

    public function create(): View
    {
        $category = new Category();
        return view('admin.category.create', [
            'category' => $category
        ]);
    }

    public function store(Category $category, Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:categories|max:3',
            'slug' => 'unique:categories',
        ]);

        $category->fill($request->all());
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Категория успешно добавлена');
    }

    public function edit(Category $category): View
    {
        return view('admin.category.create',
            [
                'category' => $category
            ]);
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required',
                'min:3',
                Rule::unique('categories')->ignore($category)],
            'slug' => Rule::unique('categories')->ignore($category)
        ]);
        $category->fill($validator->validated());
        $category->save();

        return redirect()->route('admin.category.index', ['category' => $category])->with('success', 'Категория успешно изменена');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category.index', ['category' => $category])->with('success', 'Категория успешно удалена');
    }
}
