@extends('seller.index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (isset($service))
                @include('seller.service.components.details')
            @endif
        </div>
    </div>
@endsection
