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
                    <div class="card-header">@if(($news->id))
                            Изменить новость
                        @else
                            Создать новость
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
                              action="@if(($news->id)){{ route('admin.news.update', $news) }}@else {{route('admin.news.store')}} @endif">
                            @csrf
                            @if($news->id)
                                @method('PUT')
                            @endif

                            <div class="row mb-3">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Заголовок') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group has-validation">
                                        <input id="title" type="text"
                                               class="form-control @if($errors->has('title')) is-invalid @elseif($errors->any()) is-valid @endif"
                                               name="title"
                                               value="{{$news->title ?? old('title') }}" required
                                               autocomplete="title"
                                               autofocus>
                                        <div id="validationSlugFeedback" class="invalid-feedback">
                                            @foreach($errors->get('title') as $error)
                                                {{$error}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="text"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Текст новости') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group has-validation">
                                    <textarea id="text" type="text"
                                              class="form-control @if($errors->has('text')) is-invalid @elseif($errors->any()) is-valid @endif"
                                              name="text"
                                              required>{{$news->text ?? old('text') }}</textarea>
                                        <div id="validationSlugFeedback" class="invalid-feedback">
                                            @foreach($errors->get('text') as $error)
                                                {{$error}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="text"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Категория') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group has-validation">
                                        <select name="categoryId"
                                                class="form-select @if($errors->has('categoryId')) is-invalid @elseif($errors->any()) is-valid @endif"
                                                aria-label="category">
                                            @forelse($categories as $item)
                                                <option name="categoryId" value="{{$item->id}}"
                                                        @if($item->id == $news->categoryId || $item->id == old('categoryId')) selected @endif>{{$item->name}}</option>
                                            @empty
                                                <option selected>Категории отсутствует</option>
                                            @endforelse
                                        </select>
                                        <div id="validationSlugFeedback" class="invalid-feedback">
                                            @foreach($errors->get('categoryId') as $error)
                                                {{$error}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="isPrivate" value="1"
                                                   id="isPrivate" {{$news->isPrivate == 1 || old('isPrivate') == 1 ? 'checked' : '' }}>

                                            <label class="form-check-label" for="isPrivate">
                                                Приватная новость
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            @if(($news->id))
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
