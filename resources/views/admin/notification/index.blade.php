@extends('layouts.app')
@section('navbar')
    @include('layouts.components.navbarAdmin')
@endsection

@section('content')

@endsection
@section('script')
<div class="notifications-home">
    <div class="d-flex">
        <a href="{{ route('admin.notification.create') }}" class="ml-5 btn btn-primary btn-lg float-left">أشعار جديد</a>
    </div>
    <h2 class="text-center text-info bolder mb-5 app-shadow-3"> مركز أشعارات المستحدمين</h2>
    <h4 class="text-center text-info bolder mt-2 mb-3 app-shadow-3"> الأشعارات الترحيبية للمستخدم الجديد</h4>
    @if (session('success'))
        <div class="alert alert-info bolder text-center font-25">
            {{ session('success') }}
        </div>
    @endif
    @foreach ($welcomes_role as $notification )
        <div class="card text-center m-2">
            <h4 class="card-header bg-dark">
            <a href="{{route('admin.notification.edit',$notification->id)}}"><i class="fas fa-pencil-alt text-success"></i></a>
            @if ($notification->role_id == '2')
                <span class="tag approved float-right">كل المسوقين</span>
            @elseif ($notification->role_id == '3')
                <span class="tag app-progress float-right">كل مزودين الخدمات</span>
            @elseif ($notification->role_id == '4')
                <span class="tag review float-right">كل الباحثين عن خدمة</span>
            @else
                <span class="tag waiting float-right">كل المستخدمين</span>
            @endif

            <span class="text-primary ">عنوان الأشعار :: </span><span class="text-warning bolder">{{$notification->name}}</span></h4>
            <div class="card-body text-secondary text-center">
                <h6 class="bolder text-primary">محتوى الأشعار</h6>
                {{$notification->content==='' ?"هذا الـأشعار فارغ لا يوجد أشعار ترحيبي للمستخدمين":$notification->content}}
            </div>

        </div>
    @endforeach
    <h4 class="text-center text-info bolder mb-3 app-shadow-3">سجل أشعاراتك</h4>
            <div class="card text-center m-2">
                <h4 class="card-header bg-dark text-primary bolder">السجل</h4>
                @foreach ($notifications as $notification)
                    @if ($notification->role_id !== null)
                        <span class="tag app-progress text-info bolder float-right"> أشعار لكل {{ $notification->role->name }} </span>
                        <span class="bolder tag app-progress text-success float-left">{{ $notification->timeAgo() }}</span>

                    @elseif ($notification->user_id !== null)
                        <span class="tag waiting text-info bolder">أشعار للمستخدم ( {{ $notification->user->name }} )</span>
                        <span class="bolder tag waiting text-success float-left">{{ $notification->timeAgo() }}</span>
                    @else
                        <span class="tag app-progress text-info bolder float-right"> أشعار لكل المستخدمين </span>
                        <span class="bolder tag app-progress text-success float-left">{{ $notification->timeAgo() }}</span>
                    @endif

                    <span class="text-primary bolder mt-3">{{$notification->name}}</span>
                    <div class="card-body text-secondary pt-3 text-center">
                        {{$notification->content}}
                    </div>
                    <hr/>
                @endforeach
                @if($notifications->lastPage() > 1)
                    <h6 class="text-primary bolder">تصفح السجل</h6>
                    <div class="d-flex justify-content-center">
                        {!! $notifications->links('pagination::bootstrap-4') !!}
                    </div>
                @endif

            </div>
        </div>
</div>

@endsection
{{-- enum('user','now-role','buy-role','sale-role','welcome-role') --}}
