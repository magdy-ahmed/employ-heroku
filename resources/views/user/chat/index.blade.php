@extends('layouts.app')
@section('content')
    <div class="messages-user">
       <div class="card card-body d-none side-menu" id="services-content">
            <h4 class="text-right text-info bolder app-shadow-3">جميع محادثات الخدمات</h4>
            <div class="sevices " >
                @foreach ($services as $serv )
                    {{-- {{$serv}} --}}
                    <div class="
                    {{!$serv->is_read() ? 'text-danger ':null}}
                    service text-right bolder p-2 text-secondary mr-sm-5 mr-0"><a href="{{ route('chat.service',$serv->id) }}">{{$serv->title}}</a></div>
                @endforeach
            </div>
       </div>
    </div>
    <a class=" btn btn-primary ml-5 float-left" onclick="show(this)"  target='services-content'>عرض المحادثات</a>
    <div class="messages p-3 mt-5" onclick="hide('services-content');">
        <div class="container user-card bg-light p-2 mb-5">
            <div class="row">
                <div class="col-12 text-left">
                    <h2 class="text-info text-center bolder app-shadow-3"> محادثة حول خدمة </h2>
                    <h3 class="text-info text-center bolder app-shadow-3"><a href="{{ route('services.show',$service->id) }}">{{ $service->title }}</a></h3>
                    <h4 class="text-info text-right mr-3 bolder app-shadow-3"> مقدم الخدمة </h4>
                </div>
                <div class="col-2 text-left">
                    <a href="{{ route('profile.show',$service->profile->id) }}"><img class='service-user-img' src="{{ isset($service->profile->img)?asset('storage/'.$service->profile->img)
                    :asset('storage/basick/unprofile.png') }}"/></a>
                </div>
                <div class="col-10 text-right  d-table">
                    <h2 class="service-user-name text-primary pr-2"><a href="{{ route('profile.show',$service->profile->id) }}">{{ $service->user->name }}</a></h2>
                </div>
            </div>
        </div>

        @foreach ($messages as $message)
            @if (\Illuminate\Support\Facades\Auth::id() === $message->user_id)
                <div class="card card-body w-75 m-2">
                    <span class="bolder tag waiting text-success float-right mb-2">{{ $message->timeAgo() }}</span>
                    {{$message->content}}
                   <i class="{{ $message->is_read ?'text-success ' : 'text-secondary' }} fas fa-check-double position-absolute pl-2  left"> </i>
                </div>
            @else

                <div class="card float-left card-body bg-dark text-white w-75 m-2">
                    <span class="bolder tag app-progress text-success text-right mb-2">{{ $message->timeAgo() }}</span>
                    <span class="user bolder ml-3 tag app-progress text-secondary position-absolute left mb-2">{{ $service->user->name }} :  مقدم الخدمة</span>

                    {{$message->content}}
                </div>
            @endif
        @endforeach
    </div>
    <form method="POST"  class="form-chat" action="{{ route('chat.send',$service->id) }}" method="POST">
        @csrf
        <textarea rows="4" class="form-control" name="message" id="message-form">
        </textarea>
        <button class="btn btn-info btn-sm">
            أرسال
        </button>
    </form>
@endsection
@section('script')
    <script type="text/javascript" >
        $(document).ready(function() {
            let param = document.location.href.substring(document.location.href.lastIndexOf('/') + 1);
            if(param =''){

            }else{

            }
            sendRequestReadChat({{$service->id}})
            //sendRequestReadChat({{}})
            $(".messages").scrollTop(10000000);

        });
    </script>
@endsection
@section('style')

@endsection
