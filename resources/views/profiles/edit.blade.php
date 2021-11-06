@extends('admin.index')
@section('content')
    <div class="container app-profile">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @include('profiles.components.edit')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
