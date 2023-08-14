@extends('layouts.app')

@section('title')
    @parent Test1
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Админка</div>
                    <div class="card-body">
                        <h3>Test 1</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
