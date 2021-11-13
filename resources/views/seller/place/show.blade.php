@extends('seller.index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (isset($place))
                @include('seller.place.components.details')
            @endif
        </div>
    </div>
@endsection
