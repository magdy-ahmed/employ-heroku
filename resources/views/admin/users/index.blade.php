@extends('admin.index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 col-12">
                @include('admin.users.components.table')
            </div>
        </div>
    </div>
@endsection
