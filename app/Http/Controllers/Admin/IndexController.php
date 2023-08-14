<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function test1()
    {
//        return view('admin.test1');
        return response()->download('lara.png');
    }

    public function test2(News $news)
    {
        // *** сохраняем файл с новостями в локальном хранилище
//        $data = json_encode($news->getNewsArray(),JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//        Storage::disk('local')->put('news.txt', $data);
        // ***
        // *** варианты отправки json с новостями на скачивание
//        return  response()->json($news->getNews())
//        ->header('Content-Disposition', 'attachment;filename = "news.txt"')
//        ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//        return response()->json($news->getNews(), 200, ['Content-Disposition' => 'attachment;filename = "news.txt"'], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        // ***
        // просмотр json с новостями
        return response()->json($news->getNews(), 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
