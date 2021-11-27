@extends('admin.index')
@section('content')
    @can('sell')
        <form class="container" action="{{ route('seller.affiliteCode') }}" method="post">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <label class="app-label"> أنضم لأحد المسوقين</label>
                <input
                value="{{ old('code') }}"
                name="code" type="number" class="form-control mr-5" placeholder="الكود التسويقى" >
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" id="button-addon1">أنضم</button>
                </div>
            </div>
            @if ($marketing !== null)
                <h5 class='text-primary text-center mr-5 mb-3'>لقد قمت بالأنضمام للمسوق {{ $marketing->name }} من قبل</h5>
            @else
                <h5 class='text-secondary text-center mr-5 mb-3'>لم تنضم لأى مسوق بعد</h5>

            @endif
        @error('code')
            <div class="alert alert-danger text-center">
                {{$message}}
            </div>
        @enderror
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{session('error')}}
            </div>
        @endif
        </form>

    @endcan

    <div class="container app-profile">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                @include('profiles.components.details')
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-body min-vh-100">
                        @include('profiles.components.card')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
