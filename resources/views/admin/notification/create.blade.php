@extends('layouts.app')
@section('navbar')
    @include('layouts.components.navbarAdmin')
@endsection

@section('content')
<h2 class="text-center text-info bolder mb-5 app-shadow-3">أشعار المستخدمين</h2>
@if (session('success'))
    <div class="alert alert-info bolder text-center font-25">
        {{ session('success') }}
    </div>
@endif
<form action="{{ route('admin.notification.store') }}" method="post">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 p-2">

                <label class="app-label" for="name">عنوان الأشعار</label>
                <input name="name" id="name" class="@error('name') is-invalied @enderror form-control mr-5"/>
                @error('name')
                    <div class="alert alert-danger mr-5 mt-2">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col-8 p-2">
                <label class="app-label" for="content">محتوى الأشعار</label>
                <textarea id="content" name="content" rows="6" class="@error('content') is-invalied @enderror form-control mr-5">
                </textarea>
                @error('content')
                    <div class="alert alert-danger  mr-5 mt-2">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col-8 p-2">
                <label class="app-label" for="type">نوع الأشعار</label>
                <select name="type" onchange="selectedType();" class="custom-select mr-5"  id="type">
                    <option selected value="welcome-role">أشعار ترحيبي  حسب نوع المستخدم</option>
                    <option value="now-role">أشعار جماعى الأن حسب نوع الحساب</option>
                    <option value="user">أشعار الأن لأحد المستخدمين</option>
                </select>
            </div>
            <div class="col-8 p-2 d-none" id="users-content">
                <label class="app-label" for="user">أختار المستخدم</label>
                <select class="custom-select mr-5" name="user_id" id="user">
                    @foreach ($users as $user )
                        <option value="{{$user->id}}">{{$user->name}} --- {{$user->phone}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-8 p-2" id="roles-content">
                <label class="app-label" for="role">أختار نوع الحساب</label>
                <select class="custom-select mr-5" name="role_id" id="role">
                    <option value="2">المسوقين</option>
                    <option value="3">مزودين الخدمات</option>
                    <option value="4">مستخدم عادى</option>
                    <option value="null">كل المستخدمين</option>
                </select>
            </div>
            <div class="col-8 p-2">
                <div class="text-center pt-5">
                    <button class="btn btn-primary btn-lg">حفظ و أرسال</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
    <script type="text/javascript">
        function selectedType(){
            document.getElementById('users-content').classList.add('d-none');
            document.getElementById('roles-content').classList.add('d-none');
            var type =document.getElementById('type').value;
            if(type === 'user'){
                document.getElementById('users-content').classList.remove('d-none');
            }else if(type === 'now-role' || type === 'welcome-role'){
                document.getElementById('roles-content').classList.remove('d-none');
            }
        }

    </script>
@endsection
{{-- enum('user','now-role','welcome-role') --}}
