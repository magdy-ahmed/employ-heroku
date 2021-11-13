@extends('seller.index')
@section('content')
    <div class="container app-place">
        <div class="row justify-content-center">
            <div class="col-12">
                @if (session('info'))
                    <div class="alert alert-info bolder text-center font-25">
                        {{ session('info') }}
                    </div>
                @endif
            </div>
            <div class="col-12">
                <div class="card">
                    @if (isset($place))
                        <div class="card-header text-center font-25
                            text-success bolder">
                           {{$place->name}} <br/>تعديل المنشئة
                        </div>
                    @else
                        <div class="card-header text-center font-25
                            text-primary bolder">
                            اضافة منشئة
                        </div>
                    @endif

                    <div class="card-body app-unset">
                        @include('seller.place.components.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
