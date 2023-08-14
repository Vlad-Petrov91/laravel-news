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
                    <div class="card-header">Категории</div>
                    <div class="card-body">
                        @forelse ($categories as $category)
                            <a href="{{ route('news.category.categoryNews', ['slug' => $category->slug]) }} ">{{$category->name}}</a>
                            <br>
                        @empty
                            <p>Категории отсутствуют</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
