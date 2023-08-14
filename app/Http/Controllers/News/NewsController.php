<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
//        $news = News::all();
//        $news = News::where('isPrivate', false)->get();
        $news = News::paginate(10);
        return view('news.index', ['news' => $news]);
    }

    public function getNewsItem(News $news): View
    {
//        $news = DB::table('news')->find($id);
//        $news = News::query()->find($id);

        return view('news.newsItem', ['news' => $news]);
    }
}
