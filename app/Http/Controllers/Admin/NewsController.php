<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::paginate(10);
        return view('admin.news.index', ['news' => $news]);
    }

    public function create(News $news, Category $category, Request $request): View
    {
        $news = new News();

        return view('admin.news.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request, News $news)
    {
        $tableNameCategory = (new Category())->getTable();

        $request->validate([
            'title' => 'required|min:10|max:50',
            'text' => 'required|min:3',
            'isPrivate' => 'sometimes|in:1',
            'categoryId' => "required|exists:{$tableNameCategory},id"
        ], [],
            [
                'title' => 'Заголовок новости',
                'text' => 'Текст новости',
                'categoryId' => 'Категория новости  '
            ]);

        $news->fill($request->all());
        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Новость успешно добавлена');
    }

    public function edit(News $news, Category $categories)
    {
        return view('admin.news.create',
            [
                'news' => $news,
                'categories' => $categories::all()
            ]);
    }

    public function update(Request $request, News $news)
    {
        $tableNameCategory = (new Category())->getTable();

        $request->validate([
            'title' => 'required|min:10|max:50',
            'text' => 'required|min:3',
            'isPrivate' => 'sometimes|in:1',
            'categoryId' => "required|exists:{$tableNameCategory},id"
        ], [],
            [
                'title' => 'Заголовок новости',
                'text' => 'Текст новости',
                'categoryId' => 'Категория новости  '
            ]);


        $news->fill($request->all());
        $news->isPrivate = isset($request->isPrivate);
        $result = $news->save();
        // request()->flash();

        if ($result) {
            return redirect()->route('admin.news.index', ['news' => $news])->with('success', 'Новость успешно изменена');
        } else {
            return redirect()->route('admin.news.index', ['news' => $news])->with('error', 'Ошибка изменения новости');
        }

    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index', ['news' => $news])->with('success', 'Новость успешно удалена');
    }
}
