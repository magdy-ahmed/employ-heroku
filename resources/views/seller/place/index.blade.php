@extends('seller.index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (isset($places))
                @foreach ($places as $place )
                    <div class="col-sm-6 col-12">
                        @include('seller.place.components.card')
                    </div>
                @endforeach
            @endif
            @if($places->isEmpty())
                <div class="app-empty text-secondary">
                    قائمة منشئاتك فارغة قم بأضافة منشئة
                </div>
            @endif
        </div>
    </div>
@endsection
