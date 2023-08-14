@extends('layouts.app')

@section('title')
    @parent Админка
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@if(($category->id))
                            Изменить категорию
                        @else
                            Создать категорию
                        @endif</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif
                        <form method="POST"
                              action="@if(($category->id)){{ route('admin.category.update', $category) }}@else {{route('admin.category.store')}} @endif">
                            @csrf
                            @if(($category->id))
                                @method('PUT')
                            @endif
                            <div class="row mb-3">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Название') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group has-validation">
                                        <input id="name" type="text"
                                               class="form-control
                                               @if($errors->has('name')) is-invalid @elseif($errors->any()) is-valid @endif"
                                               name="name"
                                               value="{{$category->name ?? old('name')}}" autocomplete="name"
                                               autofocus>
                                        <div id="validationSlugFeedback" class="invalid-feedback">
                                            @foreach($errors->get('name') as $error)
                                                {{$error}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="slug"
                                       class="col-md-4 col-form-label text-md-end">{{ __('slug') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group has-validation">
                                        <input id="slug" type="text"
                                               class="form-control @if($errors->has('slug')) is-invalid @elseif($errors->any()) is-valid @endif"
                                               name="slug"
                                               value="{{$category->slug ?? old('slug') }}" required autocomplete="slug"
                                               autofocus>
                                        <div id="validationSlugFeedback" class="invalid-feedback">
                                            @foreach($errors->get('slug') as $error)
                                                {{$error}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @if(($category->id))
                                            Изменить
                                        @else
                                            Добавить
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
