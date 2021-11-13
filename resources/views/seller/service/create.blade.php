@extends('seller.index')
@section('content')
    <div class="container app-service">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    @if (isset($service))
                        <div class="card-header text-center font-25
                            text-success bolder">
                           {{$service->name}} <br/>تعديل الخدمة
                        </div>
                    @else
                        <div class="card-header text-center font-25
                            text-primary bolder">
                            اضافة خدمة
                        </div>
                    @endif

                    <div class="card-body app-unset">
                        @include('seller.service.components.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
