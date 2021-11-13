@extends('marketing.index')
@section('content')
    <div class="app-home-service m-4">
        <div class="">
            @if (isset($affiliates))
                <ul class="list-group list-group-flush">
                    @foreach ($affiliates as $affiliate )
                         @include('marketing.affiliate.components.item')
                    @endforeach
                </ul>
            @endif
            @if(empty($affiliates))
                <div class="app-empty text-secondary">
                    قائمة خدماتك فارغة قم بأضافة خدمة
                </div>
            @endif
        </div>
    </div>
@endsection
