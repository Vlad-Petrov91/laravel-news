@extends('layouts.app')

@section('title')
    @parent Профиль
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Профиль</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('updateProfile') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-end">Имя</label>

                                <div class="col-md-6">
                                    <div class="input-group has-validation">
                                        <input id="name" type="text"
                                               class="form-control @if($errors->has('name')) is-invalid @elseif($errors->any()) is-valid @endif"
                                               name="name"
                                               value="{{$user->name ?? old('name') }}" required
                                               autocomplete="name"
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
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6">
                                    <div class="input-group has-validation">
                                        <input id="email" type="email"
                                               class="form-control @if($errors->has('email')) is-invalid @elseif($errors->any()) is-valid @endif"
                                               name="email"
                                               value="{{$user->email ?? old('email') }}" required
                                               autocomplete="email"
                                        >
                                        <div id="validationSlugFeedback" class="invalid-feedback">
                                            @foreach($errors->get('email') as $error)
                                                {{$error}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">Пароль</label>

                                <div class="col-md-6">
                                    <div class="input-group has-validation">
                                        <input id="password" type="password"
                                               class="form-control @if($errors->has('password')) is-invalid @elseif($errors->any()) is-valid @endif"
                                               name="password"
                                               required
                                        >
                                        <div id="validationSlugFeedback" class="invalid-feedback">
                                            @foreach($errors->get('password') as $error)
                                                {{$error}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="newPassword"
                                       class="col-md-4 col-form-label text-md-end">Новый Пароль</label>

                                <div class="col-md-6">
                                    <div class="input-group has-validation">
                                        <input id="newPassword" type="password"
                                               class="form-control @if($errors->has('newPassword')) is-invalid @elseif($errors->any()) is-valid @endif"
                                               name="newPassword"
                                        >
                                        <div id="validationSlugFeedback" class="invalid-feedback">
                                            @foreach($errors->get('newPassword') as $error)
                                                {{$error}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Изменить
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
