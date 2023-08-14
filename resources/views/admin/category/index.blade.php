@extends('layouts.app')
@section('title')
    @parent Новости
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col"><h4>CRUD категорий</h4></div>
                            <div class="col text-end">
                                <a class="btn btn-success" href="{{ route('admin.category.create') }}">Добавить</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                            @forelse ($categories as $item)
                                <div class="card m-2">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5 class="card-text"><a
                                                        href="{{ route('news.category.categoryNews', ['slug' => $item->slug]) }}">{{$item->name}}</a>
                                                </h5>
                                            </div>
                                            <div class="col text-end">
                                                <form action="{{route('admin.category.destroy', $item)}}" method="post">
                                                    <a type="button" class="btn btn-warning"
                                                       href="{{route('admin.category.edit', $item)}}">Изменить</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>Новости отсутствуют</p>
                            @endforelse
                            <div class="row">
                                <div class="col">{{$categories->links()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
