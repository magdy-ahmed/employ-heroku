@extends('seller.index')
@section('content')
    <div class="app-home-service">
        <div class="">
            @if (isset($services))
                <ul class="list-group list-group-flush ">
                    @foreach ($services as $service )
                         @include('seller.service.components.item')
                    @endforeach
                </ul>
            @endif
            @if($services->isEmpty())
                <div class="app-empty text-secondary">
                    قائمة خدماتك فارغة قم بأضافة خدمة
                </div>
            @endif
        </div>
    </div>
@endsection
