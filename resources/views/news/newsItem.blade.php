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
                    <div class="card-header">{{$news->title}}</div>
                    <div class="card-body">
                        @if($news)
                            @if($news->isPrivate)
                                <div>
                                    <a href="#">Зарегистрируйтесь для просмотра</a>
                                </div>
                            @else
                                <h3>{{$news->text}}</h3>
                            @endif
                        @else
                            <p>Новость отсутствует</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
