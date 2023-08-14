<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{


    public function index()
    {
        $categories = Category::all();
        return view('category.index', ['categories' => $categories]);
    }

    public function categoryNews(string $slug)
    {
        $categoryId = Category::query()
            ->where('slug', $slug)
            ->first();

//        $news = News::query()
//            ->select('*')
//            ->where('categoryId', $categoryId->id)
//            ->get();

        $news = $categoryId->news();

        return view('category.categoryNews')->with(['news' => $news, 'slug' => $slug]);
    }
}
