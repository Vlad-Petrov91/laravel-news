@extends('layouts.app')
@section('title')
    @parent Новости
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Новости</div>
                    <div class="card-body">
                        @forelse ($news as $item)
                            <div>
                                <p><a href="{{ route('news.newsItem', $item) }}">{{$item->title}}</a></p>
                            </div>
                        @empty
                            <p>Новости отсутствуют</p>
                        @endforelse
                        {{$news->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
