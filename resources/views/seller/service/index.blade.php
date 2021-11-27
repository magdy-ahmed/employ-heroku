@extends('seller.index')
@section('content')
    <div class="app-home-service m-5">
        <div class="">
            @if (isset($services))
                <ul class="list-group list-group-flush ">
                    @foreach ($services as $service )
                         @include('seller.service.components.item')
                    @endforeach
                </ul>
                <div class="mt-4 d-flex justify-content-center">
                    {!! $services->links('pagination::bootstrap-4') !!}
                </div>
            @endif
            @if($services->isEmpty())
                <div class="app-empty text-secondary">
                    قائمة خدماتك فارغة قم بأضافة خدمة
                </div>
            @endif
        </div>
    </div>
@endsection
