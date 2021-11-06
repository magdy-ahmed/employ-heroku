@extends('admin.index')
@section('content')
    <div class="container app-profile">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                @include('profiles.components.details')
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-body min-vh-100">
                        @include('profiles.components.card')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
