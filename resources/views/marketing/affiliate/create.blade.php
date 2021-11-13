@extends('marketing.index')
@section('content')
    <div class="container app-service">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center font-25
                        text-primary bolder">
                        أنشاء رابط
                    </div>
                    <div class="card-body app-unset">
                        @include('marketing.affiliate.components.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
