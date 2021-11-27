@extends('seller.index')
@section('content')
    <div class="messages-user">
       <div class="card card-body d-none side-menu" id="services-content">

            <h4  class="text-right text-info bolder app-shadow-3">جميع محادثات الخدمات</h4>
            <div class="sevices" >
                @foreach ($services as $serv )
                    <div class="">
                        <a data-toggle="collapse" href="#sideMenuDropdown-{{$serv->id}}" id=""
                        class="{{!$serv->is_read() ? 'text-danger ':null}} nav-link dropdown-toggle service text-right bolder p-2 text-secondary mr-sm-5 mr-0"
                        >{{$serv->title}}

                        </a>
                            <div class="collapse" id="sideMenuDropdown-{{$serv->id}}">
                                @foreach ($serv->messages_users() as $user_ )
                                    @if ($user_->id !== \Illuminate\Support\Facades\Auth::id())
                                        <div class="{{!$user_->is_read($serv->id) ? 'text-danger ':null}} service text-right bolder p-2 text-secondary mr-sm-5 mr-0"><a href="{{route('chat.seller.show',[$serv->id,$user_->id])}}">{{$user_->name}}</a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                    </div>
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
                    <h4 class="text-info text-right mr-3 bolder app-shadow-3"> مع المستخدم </h4>
                </div>
                <div class="col-10 text-right  d-table">
                    <h2 class="service-user-name text-primary pr-5 pb-2 pt-2 bolder">{{ $user->name }}</h2>
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
                    <span class="user bolder ml-3 tag app-progress text-secondary position-absolute left mb-2">{{ $user->name }} :  المستخدم</span>

                    {{$message->content}}
                </div>
            @endif
        @endforeach
    </div>
    <form method="POST" onclick="hide('services-content');"  class="form-chat" action="{{ route('chat.seller.send',[$service->id,$user->id]) }}" method="POST">
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
            $(".messages").scrollTop(1000000);
            if(param =''){

            }else{

            }
            sendRequestReadChat_({{$service->id}},{{$user->id}})
            //sendRequestReadChat({{}})
        });
    </script>
@endsection
@section('style')

@endsection
