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
                            <div class="col"><h4>Пользователи</h4></div>
                        </div>
                        <div class="card-body">

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    @endif
                                    @if(session('error'))
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @forelse ($users as $user)
                                        <div class="card m-2">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="card-text">{{$user->name}}</h5>
                                                    </div>
                                                    <div class="col text-end">
                                                        <div class="row">
                                                            <div class="col align-self-center text-end">
                                                                <div class="orm-check form-switch form-check-reverse">
                                                                    <input class="form-check-input"
                                                                           data-id="{{$user->id}}"
                                                                           type="checkbox" @if($user->isAdmin) checked
                                                                           @endif
                                                                           role="switch" id="flexSwitchCheckChecked"
                                                                           onchange="changeAdminPermissions('{{$user->id}}')">
                                                                    <label class="form-check-label"
                                                                           for="flexSwitchCheckChecked">Admin</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <form action="{{route('admin.users.destroy', $user)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="submit" class="btn btn-danger"
                                                                           value="Delete">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>Пользователи отсутствуют</p>
                                    @endforelse
                                    <div class="row">
                                        <div class="col">{{$users->links()}}</div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>


            <script>

                async function changeAdminPermissions(id) {

                    const csrfToken = document.querySelector("[name~=_token]").value;

                    let response = await fetch('/admin/users/' + id,
                        {
                            method: 'PUT',
                            headers: {
                                "X-CSRF-Token": csrfToken
                            },
                            body: JSON.stringify({'id': id}),
                        }).then(response => {
                        let messageElement = document.getElementById('successMessage');
                        return response.text();
                    })
                        .then(text => {
                            return console.log(text);
                        })
                        .catch(error => {
                            let messageElement = document.getElementById('errorMessage');
                            console.error(error);
                        });
                    ;
                }
            </script>
@endsection
