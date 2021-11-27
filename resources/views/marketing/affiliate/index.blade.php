@extends('marketing.index')
@section('content')
    <div class="app-home-service m-4">
        <div class="">
            <div class="card card-body">
                <h3 class="text-center text-secondary">
                    الكود التسويق الخاص بك
                    <span class="text-primary">{{$code}}</span>
                </h3>
            </div>
            @if (isset($affiliates))

                <ul class="list-group list-group-flush">
                    @foreach ($affiliates as $affiliate )
                         @include('marketing.affiliate.components.item')
                    @endforeach
                </ul>
                <div class="mt-4 d-flex justify-content-center">
                    {!! $affiliates->links('pagination::bootstrap-4') !!}
                </div>
            @endif
            @if($affiliates->isEmpty())
                <div class="app-empty text-secondary">
                    قائمة روابطك  التسويقية فارغة قم بأضافة رابط
                </div>
            @endif
        </div>
    </div>
@endsection
