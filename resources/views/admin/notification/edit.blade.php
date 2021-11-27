@extends('layouts.app')
@section('navbar')
    @include('layouts.components.navbarAdmin')
@endsection

@section('content')
<h2 class="text-center text-info bolder mb-5 app-shadow-3">الرسالة الترحيبية للمستخدمين</h2>
@if (session('success'))
    <div class="alert alert-info bolder text-center font-25">
        {{ session('success') }}
    </div>
@endif
<form action="{{ route('admin.notification.update',$notification->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 p-2">

                <label class="app-label" for="name">عنوان الأشعار</label>
                <input value="{{ $notification->name }}"
                 name="name" id="name" class="@error('name') is-invalied @enderror form-control mr-5"/>
                @error('name')
                    <div class="alert alert-danger mr-5 mt-2">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col-8 p-2">
                <label class="app-label" for="content">محتوى الأشعار</label>
                <textarea id="content" name="content" rows="6" class="@error('content') is-invalied @enderror form-control mr-5">
                 {{ $notification->content }}
                </textarea>
                @error('content')
                    <div class="alert alert-danger  mr-5 mt-2">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col-8 p-2">
                <div class="text-center pt-5">
                    <button class="btn btn-success btn-lg">حفظ </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
{{-- enum('user','now-role','welcome-role') --}}
