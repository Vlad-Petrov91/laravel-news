@extends('layouts.app')

@section('title')
    @parent Категории
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Новости категории {{$slug}}</div>
                    <div class="card-body">
                        @forelse ($news as $item)
                            <div>
                                <p><a href="{{ route( 'news.newsItem', $item->id)}}">{{$item->title}}</a></p>
                            </div>
                        @empty
                            <p>Новости отсутствуют</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
