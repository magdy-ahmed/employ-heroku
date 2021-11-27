@extends('seller.index')
@section('content')

    <div class="p-5">
        <div class="row justify-content-center">

            @if (isset($places))
                @foreach ($places as $place )
                    <div class="col-sm-6 col-12 p-2">
                        @include('seller.place.components.card')
                    </div>

                @endforeach
                <div class="mt-4 d-flex justify-content-center">
                    {!! $places->links('pagination::bootstrap-4') !!}
                </div>

            @endif
            @if($places->isEmpty())
                <div class="app-empty text-secondary">
                    قائمة منشئاتك فارغة قم بأضافة منشئة
                </div>
            @endif
        </div>
    </div>

@endsection
